<?php

namespace App\Http\Controllers;

use App\Models\Meal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MealController extends Controller
{
    public function index()
    {
        $meals = Meal::all();
        return view('index', compact('meals'));
    }

    public function show($mealId)
    {

    }

    public function create()
    {
        return view('addpage');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'description' => 'required|nullable|string',
            'price' => 'required|numeric',
            'image' => 'required|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('images/meals', 'public');
        }

        Meal::create($data);

        return redirect()->route("adminpage")->with('success', 'Meal Added');
    }

    public function edit(Meal $meal)
    {
        return view('updatepage', compact('meal'));
    }

    public function update(Request $request, Meal $meal)
    {


        $data = $request->validate([
            'name' => 'nullable|string',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'image' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('images/meals', 'public');
        }

        $meal->update($data);

        return redirect()->route('adminpage')->with('success', 'Meal Updated');
    }

    public function destroy(Meal $meal)
    {
        $meal->delete();
        return redirect()->route('adminpage')->with('success', 'Meal Deleted');
    }
}
