<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Member;
use App\Models\Borrowing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class BorrowingController extends Controller
{
    // Daftar transaksi peminjaman
    public function index(Request $request)
    {
        $query = Borrowing::with([
            'book',
            'member',
            'user'
        ])->latest();

        if ($request->filled('search')) {
            $search = $request->search;

            $query->where(function ($q) use ($search) {
                $q->whereHas('book', function ($book) use ($search) {
                    $book->where('title', 'like', "%{$search}%");
                })
                    ->orWhereHas('member', function ($member) use ($search) {
                        $member->where('name', 'like', "%{$search}%");
                    });
            });
        }

        if (
            $request->filled('status') &&
            in_array($request->status, ['dipinjam', 'dikembalikan'])
        ) {
            $query->where('status', $request->status);
        }

        $borrowings = $query->paginate(10)->withQueryString();

        return view('borrowings.index', compact('borrowings'));
    }

    // Form tambah peminjaman
    public function create()
    {
        $members = Member::orderBy('name')->get();

        $books = Book::where('stock', '>', 0)
            ->orderBy('title')
            ->get();

        return view('borrowings.create', compact('members', 'books'));
    }

    // Simpan transaksi peminjaman
    public function store(Request $request)
    {
        $validated = $request->validate([
            'member_id' => 'required|exists:members,id',
            'book_id' => 'required|exists:books,id',
            'borrowed_at' => 'required|date|before_or_equal:today',
            'due_at' => 'required|date|after_or_equal:borrowed_at',
        ]);

        DB::transaction(function () use ($validated) {

            // Lock baris buku untuk mencegah stok minus
            $book = Book::whereKey($validated['book_id'])
                ->lockForUpdate()
                ->firstOrFail();

            if ($book->stock < 1) {
                throw ValidationException::withMessages([
                    'book_id' => 'Stok buku habis. Pilih buku lain.'
                ]);
            }

            // Simpan transaksi
            Borrowing::create([
                'user_id' => Auth::id(),
                'member_id' => $validated['member_id'],
                'book_id' => $validated['book_id'],
                'borrowed_at' => $validated['borrowed_at'],
                'due_at' => $validated['due_at'],
                'status' => 'dipinjam',
            ]);

            // Kurangi stok
            $book->decrement('stock');
        });

        return redirect()
            ->route('borrowings.index')
            ->with('success', 'Peminjaman berhasil dicatat! Stok buku berkurang 1.');
    }

    // Proses pengembalian buku
    public function returnBook(Borrowing $borrowing)
    {
        DB::transaction(function () use ($borrowing) {

            $transaction = Borrowing::whereKey($borrowing->id)
                ->lockForUpdate()
                ->firstOrFail();

            if ($transaction->status !== 'dipinjam') {
                throw ValidationException::withMessages([
                    'return' => 'Buku ini sudah dikembalikan.'
                ]);
            }

            $book = Book::whereKey($transaction->book_id)
                ->lockForUpdate()
                ->firstOrFail();

            // Perbarui status transaksi
            $transaction->update([
                'status' => 'dikembalikan',
                'returned_at' => now()->toDateString(),
            ]);

            // Tambahkan kembali stok
            $book->increment('stock');
        });

        return redirect()
            ->route('borrowings.index')
            ->with('success', 'Buku berhasil dikembalikan! Stok bertambah 1.');
    }

    // Detail transaksi
    public function show(Borrowing $borrowing)
    {
        $borrowing->load(['book', 'member', 'user']);

        return view('borrowings.show', compact('borrowing'));
    }
}
