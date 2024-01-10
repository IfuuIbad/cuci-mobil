<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Membership;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $membership = Car::query()->get();
        $activeCars = Car::whereDate('exp_membership', ">", now())->count();
        $expiredCars = Car::whereDate('exp_membership', "<=", Carbon::now())->count();

        return view('home', [
            'memberships' => $membership,
            'activeCars' => $activeCars,
            'expiredCars' => $expiredCars
        ]);
    }

    public function create()
    {
        return view('admin.admin');
    }

    public function inbox()
    {
        return view('admin.inbox');
    }
}
