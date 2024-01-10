<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Membership;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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
        return view('membership.pricing');
    }

    public function register($membershipId)
    {
        $membership = Membership::findOrFail($membershipId);

        return view('membership.register', [
            'membership' => $membership
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'license_number' => 'required|unique:cars|max:20',
            'color' => 'required|max:50',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $date = "";
        if ($request->membership_id == 1) {
            $date = Carbon::today()->setTime(12, 0, 0);
        } elseif ($request->membership_id == 2) {
            $date = Carbon::today()->addMonthNoOverflow()->startOfMonth()->setHour(12)->setMinute(0)->setSecond(0);
        } else {
            $date = Carbon::today()->addYear()->startOfDay()->setHour(12);
        }

        $car = new Car();
        $car->user_id = Auth::id();
        $car->name = $request->name;
        $car->license_number = $request->license_number;
        $car->color = $request->color;
        $car->exp_membership = $date;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            Storage::putFileAs('public/cars', $image, $imageName);
            $car->image = $imageName; // Save the image name in the database
        }

        if ($car->save()) {
            $car->memberships()->attach($request->membership_id);
        }

        return redirect()->route('member.dashboard');
    }
}
