@extends('layouts.app')

@section('title', 'Daftar Buku')

@section('content')
<h2>Daftar Buku</h2>

<ul>
    @foreach($books as $key => $book)
    <li>
        <strong>Judul : </strong> {{$book}} <br>
        <strong>Penulis : </strong> {{$authors[$key]}} <br>
        <strong>Tahun : </strong> {{$years[$key]}} <br>

    </li>
    @endforeach
</ul>

@if($stock > 0)
<p>Stok tersedia: {{ $stock }}</p>
@else
<p>Stok habis.</p>
@endif

@endsection