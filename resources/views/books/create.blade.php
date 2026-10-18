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

<form action="{{ route('books.store') }}" method="POST" novalidate>
    @csrf


    <div>
        <label>Title</label><br>
        <input type="text" name="title" value="{{ old('title') }}">
        @error('title')
        <span style="color: red">{{ $message }}</span>
        @enderror
    </div>


    <div>
        <label>Author</label>
        <input type="text" name="author" value="{{ old('author') }}">
        @error('author')
        <p style="color:red">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label>Year</label>
        <input type="number" name="year" value="{{ old('year') }}">
        @error('year')
        <p style="color:red">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label>Stock</label>
        <input type="number" name="stock" value="{{ old('stock') }}">
        @error('stock')
        <p style="color:red">{{ $message }}</p>
        @enderror
    </div>

    <button type="submit">Simpan</button>
</form>
@endsection