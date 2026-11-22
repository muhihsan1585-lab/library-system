@extends('layouts.app')

@section('title', 'Tambah Peminjaman')

@section('content')

<div class="page-heading">
    <div>
        <span class="eyebrow">TRANSAKSI BARU</span>
        <h2>Tambah Peminjaman</h2>
        <p>Isi formulir untuk mencatat peminjaman buku.</p>
    </div>
</div>

<form method="POST"
    action="{{ route('borrowings.store') }}"
    class="form-card">

    @csrf

    <label>
        Pilih Anggota

        <select name="member_id" required>
            <option value="">-- Pilih Anggota --</option>

            @foreach($members as $member)
            <option value="{{ $member->id }}"
                @selected(old('member_id')==$member->id)>
                {{ $member->name }}
            </option>
            @endforeach
        </select>
    </label>

    <label>
        Pilih Buku

        <select name="book_id" required>
            <option value="">-- Pilih Buku --</option>

            @foreach($books as $book)
            <option value="{{ $book->id }}"
                @selected(old('book_id')==$book->id)>
                {{ $book->title }} (Stok: {{ $book->stock }})
            </option>
            @endforeach
        </select>
    </label>

    <label>
        Tanggal Peminjaman

        <input
            type="date"
            name="borrowed_at"
            value="{{ old('borrowed_at', now()->toDateString()) }}"
            max="{{ now()->toDateString() }}"
            required>
    </label>

    <label>
        Batas Pengembalian

        <input
            type="date"
            name="due_at"
            value="{{ old('due_at', now()->addDays(7)->toDateString()) }}"
            required>
    </label>

    <div class="actions">
        <button type="submit">
            Simpan Peminjaman
        </button>

        <a href="{{ route('borrowings.index') }}"
            class="btn-light">
            Batal
        </a>
    </div>
</form>

@endsection