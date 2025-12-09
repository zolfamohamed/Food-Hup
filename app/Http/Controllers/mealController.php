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
        $meal = Meal::findOrFail($mealId);
        return view('meals.show', compact('meal'));
    }

    public function create()
    {
        return view('meals.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'image' => 'required|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('images', 'public');
        }

        Meal::create($data);

        return redirect()->route('meals.index')->with('success', 'Meal Added');
    }

    public function edit($mealId)
    {
        $meal = Meal::findOrFail($mealId);
        return view('meals.edit', compact('meal'));
    }

    public function update(Request $request, $mealId)
    {
        $meal = Meal::findOrFail($mealId);

        $data = $request->validate([
            'name' => 'nullable|string',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'image' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('images', 'public');
        }

        $meal->update($data);

        return redirect()->route('meals.index')->with('success', 'Meal Updated');
    }

    public function destroy(Meal $meal)
    {
        $meal->delete();
        return redirect()->route('meals.index')->with('success', 'Meal Deleted');
    }
}
