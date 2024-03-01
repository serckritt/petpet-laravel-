<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCartRequest;
use App\Models\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function store(StoreCartRequest $request){
        $input = $request->validated();

        Cart::create([
            'product_id' => $input['product_id'],
            'user_id' => $request->user()->id,
            'count' => $input['count'],
        ]);

        return redirect()->route('carts.index');
    }

    public function index(Request $request){
        $carts = Cart::where('user_id', $request->user()->id)
            ->with('product')  
            ->get();

        return view('purchase.cart', ['carts' => $carts]);
    }

    public function destroy(Cart $cart){
        $cart->delete();

        return redirect()->route('carts.index');
    }
}
