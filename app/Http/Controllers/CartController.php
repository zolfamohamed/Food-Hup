<?php

namespace App\Http\Controllers;

use App\Models\Meal;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function show()
    {
        $cart = session()->get('cart', []);
        return view('cart', compact('cart'));
    }

    public function add($id)
    {
        $meal = Meal::findOrFail($id);
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                'name' => $meal->name,
                'price' => $meal->price,
                'image' => $meal->image,
                'quantity' => 1
            ];
        }

        session()->put('cart', $cart);
        return redirect()->route('cart.show');
    }

    public function increase($id)
    {
        $cart = session()->get('cart', []);
        $cart[$id]['quantity']++;
        session()->put('cart', $cart);
        return redirect()->back();
    }

    public function decrease($id)
    {
    $cart = session()->get('cart', []);
    if (isset($cart[$id])) {
        if ($cart[$id]['quantity'] > 1) {
            $cart[$id]['quantity']--;
        } else  {
            unset($cart[$id]);
        }
        session()->put('cart', $cart);
    }
    return redirect()->back();
    }


    public function remove($id)
    {
        $cart = session()->get('cart', []);
        unset($cart[$id]);
        session()->put('cart', $cart);
        return redirect()->back();
    }
}
