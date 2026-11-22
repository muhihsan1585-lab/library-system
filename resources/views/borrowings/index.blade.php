@extends('layouts.app')

@section('title', 'Data Peminjaman')

@section('content')

<div class="page-heading">
    <div>
        <span class="eyebrow">TRANSAKSI PERPUSTAKAAN</span>
        <h2>Data Peminjaman Buku</h2>
        <p>Kelola peminjaman dan pengembalian buku.</p>
    </div>

    <a href="{{ route('borrowings.create') }}" class="btn">
        + Tambah Peminjaman
    </a>
</div>

<div class="panel">

    <form method="GET"
        action="{{ route('borrowings.index') }}"
        class="searchbar">

        <input
            type="text"
            name="search"
            placeholder="Cari nama anggota atau judul buku..."
            value="{{ request('search') }}">

        <select name="status" class="filter-select">
            <option value="">Semua Status</option>

            <option value="dipinjam"
                @selected(request('status')=='dipinjam' )>
                Dipinjam
            </option>

            <option value="dikembalikan"
                @selected(request('status')=='dikembalikan' )>
                Dikembalikan
            </option>
        </select>

        <button type="submit">Cari</button>

        <a href="{{ route('borrowings.index') }}"
            class="btn-light">
            Reset
        </a>
    </form>

    <div class="table-wrap">
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Anggota</th>
                    <th>Judul Buku</th>
                    <th>Tanggal Pinjam</th>
                    <th>Batas Kembali</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
                @forelse($borrowings as $borrowing)
                <tr>
                    <td>
                        {{ $borrowings->firstItem() + $loop->index }}
                    </td>

                    <td>
                        <strong>
                            {{ $borrowing->member?->name ?? '-' }}
                        </strong>
                    </td>

                    <td>
                        {{ $borrowing->book?->title ?? '-' }}
                    </td>

                    <td>
                        {{ $borrowing->borrowed_at?->format('d M Y') }}
                    </td>

                    <td>
                        {{ $borrowing->due_at?->format('d M Y') ?? '-' }}
                    </td>

                    <td>
                        @if($borrowing->status == 'dipinjam')
                        <span class="status-badge status-borrowed">
                            ● Dipinjam
                        </span>
                        @else
                        <span class="status-badge status-returned">
                            ● Dikembalikan
                        </span>
                        @endif
                    </td>

                    <td>
                        <div class="actions">

                            <a
                                href="{{ route('borrowings.show', $borrowing) }}"
                                class="btn-light">
                                Detail
                            </a>

                            @if($borrowing->status == 'dipinjam')
                            <form
                                method="POST"
                                action="{{ route('borrowings.return', $borrowing) }}"
                                onsubmit="return confirm('Konfirmasi pengembalian buku ini?')">
                                @csrf
                                @method('PATCH')

                                <button type="submit" class="btn-return">
                                    Kembalikan
                                </button>
                            </form>
                            @endif

                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="empty">
                        Belum ada transaksi peminjaman.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="pagination">
        {{ $borrowings->links() }}
    </div>
</div>

@endsection