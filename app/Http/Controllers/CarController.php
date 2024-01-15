<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $car_query = Car::query()
                ->where('user_id', Auth::id());

        if (isset($request->car_id)) {
            $car_query->where('id', $request->car_id);
        }

        $cars = $car_query->get();

        return view('car.dashboard', compact('cars'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('car.register');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'license_number' => 'required|unique:cars|max:20',
            'color' => 'required|max:50',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $car = new Car();
        $car->user_id = Auth::id();
        $car->name = $request->name;
        $car->license_number = $request->license_number;
        $car->color = $request->color;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            Storage::putFileAs('public/cars', $image, $imageName);
            $car->image = $imageName; // Save the image name in the database
        }

        $car->save();

        toastr()->success('Car saved successfully!', 'Success');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
