<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Membership;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

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

    public function index()
    {
        $cars = Car::query()
            ->where('user_id', Auth::id())
            ->get();

        return view('membership.dashboard', [
            'cars' => $cars
        ]);
    }

    public function pricing()
    {
        $memberships = Membership::query()->get();

        return view('membership.pricing', [
            'memberships' => $memberships
        ]);
    }

    public function register($membershipId)
    {
        $membership = Membership::findOrFail($membershipId);
        $cars = Car::query()->where('user_id', Auth::id())->get();

        return view('membership.register', compact('membership', 'cars'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'car_id' => 'required',
            'membership_id' => 'required',
            'membership_price' => 'required'
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            toastr()->error($errors->first(), 'Sorry');
            return redirect()->back()->withInput();
        }

        $date = Carbon::now();
        $membership = Membership::findOrFail($request->membership_id);

        if($membership->duration_month > 0) {
            $date->addMonth($membership->duration_month);
        }

        if($membership->duration_day > 0) {
            $date->addDay($membership->duration_day);
        }

        $car = Car::findOrFail($request->car_id);

        if ($car) {
            $car->exp_membership = $date;
            $car->save();

            $car->memberships()->attach($request->membership_id);
        }

        toastr()->success('Data has been saved successfully!', 'Success');
        return redirect()->route('member.dashboard');
    }
}
