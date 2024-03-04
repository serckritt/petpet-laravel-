<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCartRequest;
use App\Models\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function store(StoreCartRequest $request){
        //장바구니 등록
        $input = $request->validated();

        Cart::create([
            'product_id' => $input['product_id'],
            'user_id' => $request->user()->id,
            'count' => $input['count'],
        ]);

        return redirect()->route('carts.index');
    }

    public function index(Request $request){
        //장바구니 목록 보기
        $carts = Cart::where('user_id', $request->user()->id)
            ->with('product')  
            ->get();

        return view('purchase.cart', ['carts' => $carts]);
    }

    public function destroy(Cart $cart){
        //버튼 클릭시 장바구니 삭제
        $cart->delete();

        return redirect()->route('carts.index');
    }
}
