<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //상품 리스트 화면

        $category = Category::find($request->category); //카테고리로 검색했을경우
        $search = $request->search;             //검색어로 검색했을 경우

        $products = Product::when($search, function($query, $search){ 
                $query->where('name', 'like', "%$search%"); // 검색어가 있을 경우에는 검색

            })->when($category, function($query, $category){// 카테고리로 검색했을 경우 if-else

                if($category->parent_id == 0){  // 최상위 카테고리로 검색시 하위 카테고리까지 전부 검색
                    return $query->whereIn('category_id', $category->children());

                }else{                          //아닐경우 해당 카테고리만 검색
                    return $query->where('category_id', $category->id);
                }

            })->with('reviews')
            ->withAvg('reviews','rating')         //상품당 평점 평균 구하기
            ->orderBy('reviews_avg_rating','desc')  //리뷰 평점순 정렬
            ->get();

        return view('products.index', ['products' => $products, 'search' => $search, 'category' => $category]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //각각의 상품 상세 페이지
        //리뷰의 시간순 정렬을 해야하나 작동 안되는 이유를 모르겠음

        // $product->load('reviews.user');             //상품의 리뷰, 리뷰의 작성자를 같이 로드해야함
        // $product->loadAvg('reviews','rating');        //상품당 평점 평균 구하기

        // 이방법을 사용하려 했으나 desc 적용하는법을 몰라 다른방법 사용

        $reviews = $product->reviews()
                            ->with('user')
                            ->latest()
                            ->get();

        // 평균은 뷰 파일에서 avg 메소드로 구하게 시켰음   

        return view('products.show', ['product' => $product, 'reviews' => $reviews]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}
