@extends('layouts.app')

@section('title', 'Edit Buku')

@section('content')
<h2>Edit Buku</h2>

@if ($errors->any())
<div class="validation-errors">
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
        <span class="error">{{ $message }}</span>
        @enderror
    </p>

    <p>
        <label>Author</label><br>
        <input type="text" name="author"
            value="{{ old('author', $book->author) }}">
        @error('author')
        <span class="error">{{ $message }}</span>
        @enderror
    </p>

    <p>
        <label>Year</label><br>
        <input type="number" name="year"
            value="{{ old('year', $book->year) }}">
        @error('year')
        <span class="error">{{ $message }}</span>
        @enderror
    </p>

    <p>
        <label>Stock</label><br>
        <input type="number" name="stock"
            value="{{ old('stock', $book->stock) }}">
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
                @selected(old('category_id', $book->category_id) == $category->id)>
                {{ $category->name }}
            </option>
            @endforeach
        </select>
        @error('category_id')
        <span class="error">{{ $message }}</span>
        @enderror
    </p>

    <button type="submit">Update</button>
    <a href="{{ route('books.index') }}">Kembali</a>
</form>
@endsection