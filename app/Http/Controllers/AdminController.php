<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function create()
    {
        return view('admin.admin');
    }

    public function inbox()
    {
        return view('admin.inbox');
    }

    public function pricing()
    {
        return view('admin.pricing');
    }
}
