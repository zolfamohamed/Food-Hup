<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Meal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{

    public function show()
    {
        session(['from_index' => true]);
        $cart = Cart::where('user_id', Auth::id())->get();
        return view('cart', compact('cart'));

    }

    public function add($mealid)
    {

        $item = Cart::where('user_id', Auth::id())->where("meal_id",$mealid)->first();;
        if ($item) {
                $item->increment('quantity');
        } else {
            Cart::create([
                'user_id' => Auth::id(),
                'meal_id' => $mealid,
                'quantity' => 1,
            ]);
        }

        return redirect()->back();
    }

    public function increase($cartid)
    {
        $item = Cart::where('id', $cartid)
            ->where('user_id', Auth::id())
            ->firstOrFail();
           $item->increment('quantity');
        return redirect()->route("cart.show");
    }

    public function decrease($cartid)
    {
        $item = Cart::where('user_id', Auth::id())->where("id",$cartid)->firstOrFail();

         $item->quantity--;
        if($item->quantity>0)
        {
            $item->decrement('quantity');
        }
        else
        {
            $item->delete();
        }
        return redirect()->route("cart.show");
    }


    public function remove($cartid)
    {
        $item = Cart::where('user_id', Auth::id())->where("id",$cartid)->firstOrFail();
        $item->delete();
        return redirect()->route("cart.show");
    }
    public function checkout()
    {
        $cart = Cart::where('user_id', Auth::id())->delete();

        return redirect()->route("index") ->with("success", "checkout successful");
    }
}
