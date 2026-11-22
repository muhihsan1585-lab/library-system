<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class MemberController extends Controller
{
    public function index(Request $request)
    {
        $query = Member::withCount('borrowings')->latest();

        if ($request->filled('search')) {
            $search = $request->search;

            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%");
            });
        }

        $members = $query->paginate(10)->withQueryString();

        return view('members.index', compact('members'));
    }

    public function create()
    {
        return view('members.form', [
            'member' => new Member()
        ]);
    }

    public function store(Request $request)
    {
        $validated = $this->validateMember($request);

        Member::create($validated);

        return redirect()
            ->route('members.index')
            ->with('success', 'Anggota berhasil ditambahkan!');
    }

    public function edit(Member $member)
    {
        return view('members.form', compact('member'));
    }

    public function update(Request $request, Member $member)
    {
        $validated = $this->validateMember($request, $member);

        $member->update($validated);

        return redirect()
            ->route('members.index')
            ->with('success', 'Anggota berhasil diperbarui!');
    }

    public function destroy(Member $member)
    {
        if ($member->borrowings()->exists()) {
            return back()->withErrors([
                'member' => 'Anggota memiliki riwayat peminjaman.'
            ]);
        }

        $member->delete();

        return redirect()
            ->route('members.index')
            ->with('success', 'Anggota berhasil dihapus!');
    }

    private function validateMember(
        Request $request,
        ?Member $member = null
    ): array {
        return $request->validate([
            'name' => 'required|string|max:150',
            'email' => [
                'required',
                'email',
                'max:255',
                Rule::unique('members', 'email')
                    ->ignore($member?->id)
            ],
            'phone' => 'nullable|string|max:30',
            'address' => 'nullable|string|max:1000'
        ]);
    }
}
