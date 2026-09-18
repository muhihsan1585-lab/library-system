<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $stock = 5;
        $member = 5;
        $categories = 5;
        return view('dashboard.index', compact(
            'stock',
            'member',
            'categories'
        ));
    }
}
