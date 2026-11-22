@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')

<div class="page-heading">
    <div>
        <span class="eyebrow">OVERVIEW</span>
        <h2>Dashboard Perpustakaan</h2>
        <p>
            Selamat datang, {{ auth()->user()->name }}!
            Berikut ringkasan aktivitas perpustakaan.
        </p>
    </div>

    <span class="date-chip">
        {{ now()->format('d M Y') }}
    </span>
</div>

<div class="stats">

    <div class="stat">
        <div class="stat-top">
            <span>Total Buku</span>
            <span class="stat-icon">📚</span>
        </div>
        <strong>{{ $books }}</strong>
        <small>Judul buku terdaftar</small>
    </div>

    <div class="stat">
        <div class="stat-top">
            <span>Stok Tersedia</span>
            <span class="stat-icon">📦</span>
        </div>
        <strong>{{ $stock }}</strong>
        <small>Eksemplar tersedia</small>
    </div>

    <div class="stat">
        <div class="stat-top">
            <span>Total Anggota</span>
            <span class="stat-icon">👥</span>
        </div>
        <strong>{{ $member }}</strong>
        <small>Anggota terdaftar</small>
    </div>

    <div class="stat">
        <div class="stat-top">
            <span>Total Kategori</span>
            <span class="stat-icon">🏷️</span>
        </div>
        <strong>{{ $categories }}</strong>
        <small>Kategori buku</small>
    </div>

    <div class="stat">
        <div class="stat-top">
            <span>Sedang Dipinjam</span>
            <span class="stat-icon">📖</span>
        </div>
        <strong>{{ $active }}</strong>
        <small>Transaksi aktif</small>
    </div>

    <div class="stat">
        <div class="stat-top">
            <span>Sudah Dikembalikan</span>
            <span class="stat-icon">✅</span>
        </div>
        <strong>{{ $returned }}</strong>
        <small>Transaksi selesai</small>
    </div>

</div>

<div class="panel quick-panel">
    <h3>Akses Cepat</h3>
    <p>Pilih menu untuk mengelola perpustakaan.</p>

    <div class="quick-links">
        <a href="{{ route('books.index') }}">
            📚 Kelola Buku
        </a>

        <a href="{{ route('categories.index') }}">
            🏷️ Kelola Kategori
        </a>

        <a href="{{ route('members.index') }}">
            👥 Kelola Anggota
        </a>

        <a href="{{ route('borrowings.index') }}">
            📖 Peminjaman
        </a>
    </div>
</div>

@endsection