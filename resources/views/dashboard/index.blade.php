@extends('layouts.app')
@section('title', 'Daftar Buku')
@section('content')

<h2>Library System Dashboard</h2>
<p> Selamaatt Datangg di Sistem Informasi Perpustakaan </p>

<p> Jumlah Member : {{$member}} </p>
<p> Jumlah Kategori : {{$categories}} </p>

@if($stock > 0)
<p> Stock Tersedia : {{$stock}} </p>
@else
<p> Buku Sedang Habis. </p>
@endif

@endsection