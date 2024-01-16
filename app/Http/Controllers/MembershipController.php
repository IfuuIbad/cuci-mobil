<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Membership;
use App\Models\Transaction;
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
            ->with('memberships')
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
        $car = Car::findOrFail($request->car_id);


        $date = Carbon::now();
        if($car->exp_membership >= $date){
            $date = Carbon::parse($car->exp_membership);
        }

        $membership = Membership::findOrFail($request->membership_id);

        if($membership->duration_month > 0) {
            $date->addMonth($membership->duration_month);
        }

        if($membership->duration_day > 0) {
            $date->addDay($membership->duration_day);
        }


        if ($car) {
            $car->exp_membership = $date;
            $car->save();

            $car->memberships()->attach($request->membership_id);

            $this-> insertTransaction($car, $membership);
        }

        toastr()->success('Data has been saved successfully!', 'Success');
        return redirect()->route('member.dashboard');
    }

    public function insertTransaction($car, $membership){
        $json_car = json_encode($car);
        $json_membership = json_encode($membership);
        $invoice = $this->invoiceNumber();
        $insert = Transaction::create([
            'user_id' =>  Auth::id(),
            'invoice' =>  $invoice,
            'car' => $json_car,
            'membership' => $json_membership,
            'total_price' => $membership->price,
        ]);
    }

    function invoiceNumber()
    {
        $latest = Transaction::latest()->first();

        if (!$latest) {
            return 'INVOICE_1';
        }

        $stringINV = explode("_",$latest->invoice);
        // dd($stringINV);
        $number = $stringINV[1] + 1;


        return 'INVOICE_' . $number;
    }

    public function carDetail($id)
    {
        // dd($transaction);
        $car = Car::with('memberships')->where('id', $id)->get();
        // dd($car);
        // $transaction->car = json_decode($transaction->car);
        // $transaction->membership = json_decode($transaction->membership);

        // $member = User::findOrFail($transaction->car->user_id);

        return view('membership.carDetail', [
            'car' => $car[0],
        ]);
    }
}
