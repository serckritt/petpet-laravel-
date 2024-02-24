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

        $products = Product::when($search, function($query, $search){ // 검색어가 있을경우 검색
                $query->where('name', 'like', "%$search%");

            })->when($category, function($query, $category){ // 카테고리 검색시

                if($category->parent_id == 0){ // 최상위 카테고리로 검색시 하위 카테고리까지 전부 검색
                    return $query->whereIn('category_id', $category->children());

                }else{ //아닐경우 해당 카테고리만 검색
                    return $query->where('category_id', $category->id);
                }

            })->get();

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
        //
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
