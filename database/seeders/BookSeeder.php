<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Book::create([
            'title' => 'Pemrograman PHP',
            'author' => 'Andi',
            'year' => 2024,
            'stock' => 5,
        ]);
        Book::create([
            'title' => 'Laskar Pelangi',
            'author' => 'Andrea Hirata',
            'year' => 2005,
            'stock' => 10
        ]);

        Book::create([
            'title' => 'Bumi',
            'author' => 'Tere Liye',
            'year' => 2014,
            'stock' => 8
        ]);

        Book::create([
            'title' => 'Negeri 5 Menara',
            'author' => 'Ahmad Fuadi',
            'year' => 2009,
            'stock' => 7
        ]);

        Book::create([
            'title' => 'Perahu Kertas',
            'author' => 'Dee Lestari',
            'year' => 2009,
            'stock' => 6
        ]);

        Book::create([
            'title' => 'Dilan 1990',
            'author' => 'Pidi Baiq',
            'year' => 2014,
            'stock' => 9
        ]);
    }
}
