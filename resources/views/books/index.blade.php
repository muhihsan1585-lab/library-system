@extends('layouts.app')

@section('title', 'Daftar Buku')

@section('content')
<h2>Daftar Buku</h2>

<table border="1" cellpadding="8" cellspacing="0">
    <tr>
        <th>ID</th>
        <th>Title</th>
        <th>Author</th>
        <th>Year</th>
        <th>Stock</th>
    </tr>

    @foreach ($books as $book)
    <tr>
        <td>{{ $book->id }}</td>
        <td>{{ $book->title }}</td>
        <td>{{ $book->author }}</td>
        <td>{{ $book->year }}</td>
        <td>{{ $book->stock }}</td>
    </tr>
    @endforeach
</table>
@endsection