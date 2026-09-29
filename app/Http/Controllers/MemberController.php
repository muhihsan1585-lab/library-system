<?php

namespace App\Http\Controllers;

class MemberController extends Controller
{
    public function index()
    {
        $members = [
            'Muhammad Ihsan',
            'Nanda',
            'Resa',
            'Cimii',
            'Cumi'
        ];
        return view('members.index', compact('members'));
    }
};
