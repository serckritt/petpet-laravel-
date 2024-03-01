<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;

class PurchaseController extends Controller
{
    public function purchaseWindow(Request $request){

        if(isset($request->type)){
            $product = Product::find($request->product_id);
            return view('purchase/purchase-window', ['product' => $product, 'count' => $request->count]);
        }else{
            $carts = Cart::where('user_id', $request->user()->id)
            ->with('product')  
            ->get();
            
            return view('purchase/purchase-window', ['carts' => $carts]);
        }
    }

    public function purchase(Request $request){

        if(isset($request->type)){
            
        }else{
            
        }
    }
}
