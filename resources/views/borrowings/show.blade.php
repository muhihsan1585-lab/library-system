@extends('layouts.app')

@section('title', 'Detail Peminjaman')

@section('content')

<div class="page-heading">
    <div>
        <span class="eyebrow">DETAIL TRANSAKSI</span>
        <h2>Detail Peminjaman #{{ $borrowing->id }}</h2>
        <p>Informasi lengkap transaksi perpustakaan.</p>
    </div>

    <a href="{{ route('borrowings.index') }}"
        class="btn-light">
        Kembali
    </a>
</div>

<div class="panel detail-panel">

    <h3>Informasi Peminjaman</h3>

    <div class="detail-grid">

        <div class="detail-item">
            <span>Nama Anggota</span>
            <strong>{{ $borrowing->member?->name ?? '-' }}</strong>
        </div>

        <div class="detail-item">
            <span>Judul Buku</span>
            <strong>{{ $borrowing->book?->title ?? '-' }}</strong>
        </div>

        <div class="detail-item">
            <span>Petugas</span>
            <strong>{{ $borrowing->user?->name ?? '-' }}</strong>
        </div>

        <div class="detail-item">
            <span>Tanggal Pinjam</span>
            <strong>
                {{ $borrowing->borrowed_at?->format('d M Y') }}
            </strong>
        </div>

        <div class="detail-item">
            <span>Batas Pengembalian</span>
            <strong>
                {{ $borrowing->due_at?->format('d M Y') ?? '-' }}
            </strong>
        </div>

        <div class="detail-item">
            <span>Tanggal Dikembalikan</span>
            <strong>
                {{ $borrowing->returned_at?->format('d M Y') ?? '-' }}
            </strong>
        </div>

        <div class="detail-item">
            <span>Status</span>

            <div>
                @if($borrowing->status == 'dipinjam')
                <span class="status-badge status-borrowed">
                    ● Dipinjam
                </span>
                @else
                <span class="status-badge status-returned">
                    ● Dikembalikan
                </span>
                @endif
            </div>
        </div>

    </div>

    @if($borrowing->status == 'dipinjam')
    <form
        action="{{ route('borrowings.return', $borrowing) }}"
        method="POST"
        class="detail-return"
        onsubmit="return confirm('Yakin ingin mengembalikan buku ini?')">
        @csrf
        @method('PATCH')

        <button type="submit" class="btn-return">
            Konfirmasi Pengembalian
        </button>
    </form>
    @endif

</div>

@endsection