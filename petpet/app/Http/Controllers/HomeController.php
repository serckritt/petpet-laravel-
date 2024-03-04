<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __invoke()
    {
        //홈 화면

        //평점순 9개상품 구해서 최상위 3개는 슬라이드에, 6개는 작은창으로 보여줌
        $contents = Product::with('reviews')
            ->withCount('reviews')
            ->withAvg('reviews','rating')         //상품당 평점 평균 구하기
            ->orderBy('reviews_avg_rating','desc')  //리뷰 평점순 정렬
            ->take(9)
            ->get();

        //사료에서만 인기상품 5개 구하기
        $feed = Product::where('category_id', 13)    //13번: 개사료
            ->orWhere('category_id', 17)            //17번: 고양이사료
            ->withAvg('reviews','rating')         //상품당 평점 평균 구해서
            ->orderBy('reviews_avg_rating','desc')  //리뷰 평점순 정렬
            ->take(5)
            ->get();


        //간식에서만 5개 구하기, 해당범위:14,15,16,18,19
        $snack = Product::where([           
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
