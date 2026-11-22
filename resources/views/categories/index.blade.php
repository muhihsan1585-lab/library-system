@extends('layouts.app')

@section('title', 'Kategori Buku')

@section('content')

<div class="page-heading">
    <div>
        <span class="eyebrow">MANAJEMEN DATA</span>
        <h2>Data Kategori Buku</h2>
        <p>Kelola kategori koleksi buku perpustakaan.</p>
    </div>

    <a href="{{ route('categories.create') }}" class="btn">
        + Tambah Kategori
    </a>
</div>

<div class="panel">

    <form method="GET" action="{{ route('categories.index') }}"
        class="searchbar">

        <input
            type="text"
            name="search"
            placeholder="Cari kategori buku..."
            value="{{ request('search') }}">

        <button type="submit">Cari</button>

        <a href="{{ route('categories.index') }}"
            class="btn-light">
            Reset
        </a>
    </form>

    <div class="table-wrap">
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Kategori</th>
                    <th>Jumlah Buku</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
                @forelse($categories as $category)
                <tr>
                    <td>
                        {{ $categories->firstItem() + $loop->index }}
                    </td>

                    <td>
                        <strong>{{ $category->name }}</strong>
                    </td>

                    <td>
                        <span class="pill">
                            {{ $category->books_count }} Buku
                        </span>
                    </td>

                    <td>
                        <div class="actions">
                            <a
                                href="{{ route('categories.edit', $category) }}"
                                class="btn-light">
                                Edit
                            </a>

                            <form
                                action="{{ route('categories.destroy', $category) }}"
                                method="POST"
                                onsubmit="return confirm('Yakin ingin menghapus kategori ini?')">
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
                    <td colspan="4" class="empty">
                        Belum ada kategori.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="pagination">
        {{ $categories->links() }}
    </div>
</div>

@endsection