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
        //결제 진행창

        if(isset($request->type)){
            // 장바구니 없이 바로구매를 진행하는 경우
            $product = Product::find($request->product_id);

            // 리퀘스트에서 바로 상품번호와 수량만으로 
            return view('purchase/buy', ['product' => $product, 'count' => $request->count]);
        }else{
            //장바구니에서 결제를 진행하는 경우
            $carts = Cart::where('user_id', $request->user()->id)
            ->with('product')  
            ->get();
            
            //해당 유저의 장바구니 정보를 가져옴
            return view('purchase/buy', ['carts' => $carts]);
        }
    }

    public function purchase(PurchaseRequest $request){

        //결제진행

        $input = $request->validated();

        if(isset($input['type'])){
            //바로구매시
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
            //입력값을 그대로 구매기록에 등록
        }else{
            //장바구니 구매시
            $carts = Cart::where('user_id', $request->user()->id);
            $getted = $carts->get();

            foreach($getted as $cart){// 반복을 돌면서 장바구니의 모든물품을 구매하고
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
            $carts->delete(); //반복이 끝나면 장바구니에서 삭제
        }

        return redirect()->route('mypage');
    }
}
