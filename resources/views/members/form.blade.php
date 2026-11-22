@extends('layouts.app')

@section('title', $member->exists ? 'Edit Anggota' : 'Tambah Anggota')

@section('content')

<div class="page-heading">
    <div>
        <span class="eyebrow">FORM ANGGOTA</span>
        <h2>
            {{ $member->exists ? 'Edit Anggota' : 'Tambah Anggota' }}
        </h2>
        <p>Lengkapi informasi anggota perpustakaan.</p>
    </div>
</div>

<form
    method="POST"
    class="form-card"
    action="{{ $member->exists
        ? route('members.update', $member)
        : route('members.store') }}">
    @csrf

    @if($member->exists)
    @method('PUT')
    @endif

    <label>
        Nama Lengkap
        <input
            type="text"
            name="name"
            value="{{ old('name', $member->name) }}"
            placeholder="Masukkan nama lengkap"
            required>
    </label>

    <label>
        Email
        <input
            type="email"
            name="email"
            value="{{ old('email', $member->email) }}"
            placeholder="contoh@email.com"
            required>
    </label>

    <label>
        Nomor Telepon
        <input
            type="text"
            name="phone"
            value="{{ old('phone', $member->phone) }}"
            placeholder="08xxxxxxxxxx">
    </label>

    <label>
        Alamat
        <textarea
            name="address"
            rows="4"
            placeholder="Masukkan alamat lengkap">{{ old('address', $member->address) }}</textarea>
    </label>

    <div class="actions">
        <button type="submit">
            Simpan Anggota
        </button>

        <a href="{{ route('members.index') }}"
            class="btn-light">
            Batal
        </a>
    </div>
</form>

@endsection