<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Database\Seeder;

class LibrarySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            'Pemrograman',
            'Basis Data',
            'Jaringan Komputer',
            'Sistem Informasi',
            'Algoritma'
        ];

        foreach ($categories as $name) {
            Category::firstOrCreate(['name' => $name]);
        }

        $books = [
            ['title' => 'Pemrograman PHP', 'author' => 'Andi', 'year' => 2024, 'stock' => 6, 'category' => 'Pemrograman'],
            ['title' => 'Dasar Basis Data', 'author' => 'Budi Santoso', 'year' => 2023, 'stock' => 8, 'category' => 'Basis Data'],
            ['title' => 'Jaringan Komputer', 'author' => 'Siti Aminah', 'year' => 2022, 'stock' => 5, 'category' => 'Jaringan Komputer'],
            ['title' => 'Sistem Informasi Modern', 'author' => 'Dewi Lestari', 'year' => 2024, 'stock' => 7, 'category' => 'Sistem Informasi'],
            ['title' => 'Algoritma dan Struktur Data', 'author' => 'Rizky Pratama', 'year' => 2021, 'stock' => 4, 'category' => 'Algoritma'],
        ];

        foreach ($books as $item) {
            $category = Category::where('name', $item['category'])->first();

            Book::firstOrCreate(
                ['title' => $item['title']],
                [
                    'author' => $item['author'],
                    'year' => $item['year'],
                    'stock' => $item['stock'],
                    'category_id' => $category->id
                ]
            );
        }
    }
}
