@extends('layouts.app')

@section('title', 'Edit Buku')

@section('content')
<h2>Edit Buku</h2>

@if ($errors->any())
<div style="color: red; margin-bottom: 15px;">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form action="{{ route('books.update', $book->id) }}" method="POST" novalidate>
    @csrf
    @method('PUT')

    <p>
        <label>Title</label><br>
        <input type="text" name="title"
            value="{{ old('title', $book->title) }}">
        @error('title')
        <span style="color: red">{{ $message }}</span>
        @enderror
    </p>

    <p>
        <label>Author</label><br>
        <input type="text" name="author"
            value="{{ old('author', $book->author) }}">
        @error('author')
        <span style="color: red">{{ $message }}</span>
        @enderror
    </p>

    <p>
        <label>Year</label><br>
        <input type="number" name="year"
            value="{{ old('year', $book->year) }}">
        @error('year')
        <span style="color: red">{{ $message }}</span>
        @enderror
    </p>

    <p>
        <label>Stock</label><br>
        <input type="number" name="stock"
            value="{{ old('stock', $book->stock) }}">
        @error('stock')
        <span style="color: red">{{ $message }}</span>
        @enderror
    </p>

    <button type="submit">Update</button>
    <a href="{{ route('books.index') }}">Kembali</a>
</form>
@endsection