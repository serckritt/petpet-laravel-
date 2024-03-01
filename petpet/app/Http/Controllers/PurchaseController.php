<?php

namespace App\Http\Controllers;

use App\Http\Requests\PurchaseRequest;
use App\Models\Cart;
use App\Models\Product;
use App\Models\Record;
use Illuminate\Http\Request;

class PurchaseController extends Controller
{
    public function buy(Request $request){

        if(isset($request->type)){
            $product = Product::find($request->product_id);
            return view('purchase/buy', ['product' => $product, 'count' => $request->count]);
        }else{
            $carts = Cart::where('user_id', $request->user()->id)
            ->with('product')  
            ->get();
            
            return view('purchase/buy', ['carts' => $carts]);
        }
    }

    public function purchase(PurchaseRequest $request){

        $input = $request->validated();

        if(isset($input['type'])){
            
            Record::create([
                'count' =>  $input['count'],
                'product_id' => $input['product_id'],
                'user_id' => $request->user()->id,
                'postcode' =>  $input['postcode'],
                'address' => $input['address'].' '.$input['detail_address'],
                'delivery_request' =>  $input['delivery_request'],
                'credit_card' => $input['credit_card'],
                'installment' => $input['installment'],
            ]);
        }else{
            $carts = Cart::where('user_id', $request->user()->id);
            $getted = $carts->get();

            foreach($getted as $cart){
                Record::create([
                    'count' =>  $cart->count,
                    'product_id' => $cart->product_id,
                    'user_id' => $request->user()->id,
                    'postcode' =>  $input['postcode'],
                    'address' => $input['address'].' '.$input['detail_address'],
                    'delivery_request' =>  $input['delivery_request'],
                    'credit_card' => $input['credit_card'],
                    'installment' => $input['installment'],
                ]);
            }
            $carts->delete();
        }

        return redirect()->route('mypage');
    }
}
