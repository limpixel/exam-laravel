<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
// use Cart;
use Cart;

class BasketController extends Controller
{
    public function index(){
        return view('frontend.basket.index');
    }

    public function add_to_cart(Request $request){

        Cart::add([
            'id' => $request->id,
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'attributes' => [
                'image' => $request->image,
            ]

        ]);

        return redirect()->route('frontend.basket.index')->with('success', 'The Item Has been Added');
    }
}
