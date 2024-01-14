<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Membership;
use App\Models\Transaction;
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
            ->with('memberships',  function($query) {
                return $query->latest()->first();
            })
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
        // $request->validate([
        //     'name' => 'required|max:255',
        //     'license_number' => 'required|unique:cars|max:20',
        //     'color' => 'required|max:50',
        //     'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        // ]);
        // dd($request);

        // if(car exp_membership != null && car exp_membership > Carbon::now() ){
// $date = car exp_membership
        // }else{

        // }

        $date = Carbon::now();

        $membership = Membership::findOrFail($request->membership_id);

        if($membership->duration_month > 0){
            $date->addMonth($membership->duration_month);
        }

        if($membership->duration_day > 0){
            $date->addDay($membership->duration_day);
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

            $this-> insertTransaction($car, $membership);
        }

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
