<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MembershipController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    public function register()
    {
        return view('membership.register');
    }

    public function index()
    {
        return view('membership.dashboard');
    }
}
