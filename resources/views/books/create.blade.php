@extends('layouts.app')

@section('title', 'Tambah Buku')

@section('content')
<h2>Tambah Buku</h2>

@if ($errors->any())
<div class="validation-errors">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form action="{{ route('books.store') }}" method="POST" novalidate>
    @csrf

    <p>
        <label>Title</label><br>
        <input type="text" name="title"
            value="{{ old('title') }}">
        @error('title')
        <span class="error">{{ $message }}</span>
        @enderror
    </p>

    <p>
        <label>Author</label><br>
        <input type="text" name="author"
            value="{{ old('author') }}">
        @error('author')
        <span class="error">{{ $message }}</span>
        @enderror
    </p>

    <p>
        <label>Year</label><br>
        <input type="number" name="year"
            value="{{ old('year') }}">
        @error('year')
        <span class="error">{{ $message }}</span>
        @enderror
    </p>

    <p>
        <label>Stock</label><br>
        <input type="number" name="stock"
            value="{{ old('stock', 0) }}">
        @error('stock')
        <span class="error">{{ $message }}</span>
        @enderror
    </p>

    <p>
        <label>Category</label><br>
        <select name="category_id">
            <option value="">Pilih kategori</option>
            @foreach ($categories as $category)
            <option value="{{ $category->id }}"
                @selected(old('category_id')==$category->id)>
                {{ $category->name }}
            </option>
            @endforeach
        </select>
        @error('category_id')
        <span class="error">{{ $message }}</span>
        @enderror
    </p>

    <button type="submit">Simpan</button>
    <a href="{{ route('books.index') }}">Kembali</a>
</form>
@endsection