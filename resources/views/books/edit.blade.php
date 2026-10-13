@extends('layouts.app')

@section('title', 'Edit Buku')

@section('content')
<h2>Edit Buku</h2>

@if ($errors->any())
<ul>
    @foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
</ul>
@endif

<form action="{{ route('books.update', $book->id) }}" method="POST">
    @csrf
    @method('PUT')

    <p>
        <label>Title</label><br>
        <input type="text" name="title"
            value="{{ old('title', $book->title) }}" required>
    </p>

    <p>
        <label>Author</label><br>
        <input type="text" name="author"
            value="{{ old('author', $book->author) }}" required>
    </p>

    <p>
        <label>Year</label><br>
        <input type="number" name="year"
            value="{{ old('year', $book->year) }}"
            min="1000" max="9999" required>
    </p>

    <p>
        <label>Stock</label><br>
        <input type="number" name="stock"
            value="{{ old('stock', $book->stock) }}"
            min="0" required>
    </p>

    <button type="submit">Update</button>
    <a href="{{ route('books.index') }}">Kembali</a>
</form>
@endsection