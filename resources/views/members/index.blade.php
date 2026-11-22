@extends('layouts.app')

@section('title', 'Data Anggota')

@section('content')

<div class="page-heading">
    <div>
        <span class="eyebrow">MANAJEMEN ANGGOTA</span>
        <h2>Data Anggota</h2>
        <p>Kelola seluruh anggota perpustakaan.</p>
    </div>

    <a href="{{ route('members.create') }}" class="btn">
        + Tambah Anggota
    </a>
</div>

<div class="panel">

    <form action="{{ route('members.index') }}"
        method="GET" class="searchbar">

        <input
            type="text"
            name="search"
            placeholder="Cari nama atau email anggota..."
            value="{{ request('search') }}">

        <button type="submit">Cari</button>

        <a href="{{ route('members.index') }}"
            class="btn-light">
            Reset
        </a>
    </form>

    <div class="table-wrap">
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Anggota</th>
                    <th>Email</th>
                    <th>Telepon</th>
                    <th>Riwayat Pinjam</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
                @forelse($members as $member)
                <tr>
                    <td>
                        {{ $members->firstItem() + $loop->index }}
                    </td>

                    <td>
                        <strong>{{ $member->name }}</strong>
                    </td>

                    <td>{{ $member->email }}</td>

                    <td>{{ $member->phone ?? '-' }}</td>

                    <td>
                        <span class="pill">
                            {{ $member->borrowings_count }} Transaksi
                        </span>
                    </td>

                    <td>
                        <div class="actions">
                            <a
                                href="{{ route('members.edit', $member) }}"
                                class="btn-light">
                                Edit
                            </a>

                            <form
                                action="{{ route('members.destroy', $member) }}"
                                method="POST"
                                onsubmit="return confirm('Yakin ingin menghapus anggota ini?')">
                                @csrf
                                @method('DELETE')

                                <button type="submit" class="danger">
                                    Hapus
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="empty">
                        Belum ada data anggota.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="pagination">
        {{ $members->links() }}
    </div>

</div>

@endsection