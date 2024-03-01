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
        $category = Category::find($request->category);
        $search = $request->search;

        $products = Product::when($search, function($query, $search){ 
                $query->where('name', 'like', "%$search%"); // 검색어가 있을 경우에는 검색

            })->when($category, function($query, $category){ // 카테고리로 검색했을 경우에는

                if($category->parent_id == 0){  // 최상위 카테고리로 검색시 하위 카테고리까지 전부 검색
                    return $query->whereIn('category_id', $category->children());

                }else{                          //아닐경우 해당 카테고리만 검색
                    return $query->where('category_id', $category->id);
                }

            })->with('reviews')
            ->withAvg('reviews','rating')         //상품당 평점 평균 구하기
            ->orderBy('reviews_avg_rating','desc')  //리뷰 평점순 정렬
            ->get();

        //상품의 리뷰를 가져오는 과정 필요

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
        // 카테고리 값에 따라 다른 페이지를 불러와야함
        $product->load('reviews.user');
        $product->loadAvg('reviews','rating');        //상품당 평점 평균 구하기

        return view('products.show', ['product' => $product]);
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
