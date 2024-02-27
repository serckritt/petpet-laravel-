<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __invoke()
    {
        //평점순으로 상품 9개

        $contents = Product::with('reviews')
            ->withCount('reviews')
            ->withAvg('reviews','rating')         //상품당 평점 평균 구하기
            ->orderBy('reviews_avg_rating','desc')  //리뷰 평점순 정렬
            ->take(9)
            ->get();

        $feed = Product::where('category_id', 13)    //사료에서만 5개 구하기
            ->orWhere('category_id', 17)
            ->withAvg('reviews','rating')         //상품당 평점 평균 구해서
            ->orderBy('reviews_avg_rating','desc')  //리뷰 평점순 정렬
            ->take(5)
            ->get();

        $snack = Product::where([           //간식에서만 5개 구하기, 범위:14,15,16,18,19
                ['category_id', '>=', 14],
                ['category_id', '<=', 19],
                ['category_id','<>',17]
            ])->withAvg('reviews','rating')         //상품당 평점 평균 구해서
            ->orderBy('reviews_avg_rating','desc')  //리뷰 평점순 정렬
            ->take(5)
            ->get();
        return view('home', ['contents' => $contents, 'feed' => $feed,'snack' => $snack]);
    }
}
