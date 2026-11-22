<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use App\Models\Member;
use App\Models\Borrowing;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.index', [
            'books' => Book::count(),
            'stock' => Book::sum('stock'),
            'member' => Member::count(),
            'categories' => Category::count(),
            'active' => Borrowing::where('status', 'dipinjam')->count(),
            'returned' => Borrowing::where('status', 'dikembalikan')->count(),
        ]);
    }
}
