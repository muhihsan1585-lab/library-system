<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $title = 'Daftar Buku';
        $description = 'Koleksi buku pada Sistem Informasi Perpustakaan.';
        $stock = 0;
        $books = [
            'Pemrograman PHP',
            'Laravel untuk Pemula',
            'Basis Data',
            'Algoritma dan Pemrograman',
            'Pemrograman Berorientasi Objek',
            'Tutorial Menguasai Dunia Dalam 5menit',
            'Tutorial Menghancurkan Karawang Di 2026',
            'Agama Menurut Pandangan Prabowo'
        ];

        $authors = [
            'Ahmad Khusaeri',
            'Billy Ibrahim Hasbi',
            'Caerudin M.Kom',
            'Siska',
            'Muhammad Ihsan',
            'Muhammad Rheza',
            'Ahmad Fahmi',
            'Gibran'
        ];

        $years = [
            2016,
            2020,
            2017,
            2006,
            2011,
            2025,
            2026,
            2026
        ];

        $stock = 8;

        return view('books.index', compact(
            'books',
            'title',
            'stock',
            'description',
            'authors',
            'years'
        ));
    }
    public function show($id)
    {
        return 'ID Buku: ' . $id;
    }
}
