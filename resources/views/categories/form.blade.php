@extends('layouts.app')

@section('title', $category->exists ? 'Edit Kategori' : 'Tambah Kategori')

@section('content')

<div class="page-heading">
    <div>
        <span class="eyebrow">FORM KATEGORI</span>
        <h2>
            {{ $category->exists ? 'Edit Kategori' : 'Tambah Kategori' }}
        </h2>
        <p>Masukkan informasi kategori buku.</p>
    </div>
</div>

<form
    method="POST"
    class="form-card"
    action="{{ $category->exists
        ? route('categories.update', $category)
        : route('categories.store') }}">
    @csrf

    @if($category->exists)
    @method('PUT')
    @endif

    <label>
        Nama Kategori

        <input
            type="text"
            name="name"
            placeholder="Contoh: Pemrograman"
            value="{{ old('name', $category->name) }}"
            maxlength="150"
            required>
    </label>

    <div class="actions">
        <button type="submit">
            Simpan Kategori
        </button>

        <a href="{{ route('categories.index') }}"
            class="btn-light">
            Batal
        </a>
    </div>
</form>

@endsection