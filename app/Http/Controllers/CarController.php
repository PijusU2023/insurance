<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Owner;
use Illuminate\Http\Request;

class CarController extends Controller
{
    public function index()
    {
        $cars = Car::all();
        return view('cars.index', compact('cars'));
    }


    public function create()
    {
        $owners = Owner::all();
        return view('cars.create', compact('owners'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'reg_number' => 'required|string',
            'brand' => 'required|string',
            'model' => 'required|string',
            'owner_id' => 'required|exists:owners,id',
        ]);

        Car::create($request->all());
        return redirect()->route('cars.index')->with('success', 'Car added successfully.');
    }

    public function edit($id)
    {
        $car = Car::findOrFail($id);
        $owners = Owner::all();
        return view('cars.edit', compact('car', 'owners'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'reg_number' => 'required|string',
            'brand' => 'required|string',
            'model' => 'required|string',
            'owner_id' => 'required|exists:owners,id',
        ]);

        $car = Car::findOrFail($id);
        $car->update($request->all());
        return redirect()->route('cars.index')->with('success', 'Car updated successfully.');
    }

    public function destroy($id)
    {
        $car = Car::findOrFail($id);
        $car->delete();
        return redirect()->route('cars.index')->with('success', 'Car deleted successfully.');
    }
    public function __construct()
    {
        $this->middleware('auth');
    }

}
