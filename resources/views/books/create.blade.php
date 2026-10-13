@extends('layouts.app')

@section('title', 'Tambah Buku')

@section('content')
<h2>Tambah Buku</h2>

@if ($errors->any())
<ul>
    @foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
</ul>
@endif

<form action="{{ route('books.store') }}" method="POST">
    @csrf

    <p>
        <label>Title</label><br>
        <input type="text" name="title"
            value="{{ old('title') }}" required>
    </p>

    <p>
        <label>Author</label><br>
        <input type="text" name="author"
            value="{{ old('author') }}" required>
    </p>

    <p>
        <label>Year</label><br>
        <input type="number" name="year"
            value="{{ old('year') }}" min="1000" max="9999" required>
    </p>

    <p>
        <label>Stock</label><br>
        <input type="number" name="stock"
            value="{{ old('stock', 0) }}" min="0" required>
    </p>

    <button type="submit">Simpan</button>
    <a href="{{ route('books.index') }}">Kembali</a>
</form>
@endsection