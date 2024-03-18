<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Contracts\Validation\Rule;

use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use Image;

class SearchController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function searchname(Request $request){
       $search = $request->search;
       //dd($search);
       $products = Product::where('name', 'like', '%'.$search.'%')->get();
       return view('frontend.search.name', compact('products'));
    }

    public function search(){
        $category = Category::all();
        $brand = Brand::all();
        return view('frontend.search.search', compact('category', 'brand'));
    }

    public function getadvanced(){
        $x = 1;
        $products = Product::orderBy('created_at', 'desc')->paginate(6);
        return view('frontend.search.advanced', compact('products', 'x'));
    }
    public function advanced(Request $request){
        $name = $request->name;
        $price = $request->price;
        $category_id = $request->category_id;
        $brand_id = $request->brand_id;
        $status = $request->status;
        $query = Product::query();
        $x = 1;
        if ($name != null) {
            $query->where('name', 'like', "%$name%");
            $x = 0;
        }
        if ($price != 2) {
            $minPrice = explode('-', $price)[0];
            $maxPrice = explode('-', $price)[1];
            $query->whereBetween('price', [$minPrice, $maxPrice]);
            $x = 0;
        }
        if ($category_id != 2) {
            $query->whereHas('category', function ($q) use ($category_id) {
                $q->where('id', $category_id);
            });
            $x = 0;
        }
        if ($brand_id != 2) {
            $query->whereHas('brand', function ($q) use ($brand_id) {
                $q->where('id', $brand_id);
            });
            $x = 0;
        }
        if ($status != 2) {
            $query->where('status', $status);
            $x = 0;
        }
        if($x == 1){
            $products = $query->orderBy('created_at', 'desc')->paginate(6);
        }else{
            $products = $query->orderBy('created_at', 'desc')->get();
        }                       
        return view('frontend.search.advanced', compact('x', 'products'));
        
    }

    public function price(Request $request){
        $minPrice = $request->minPrice;
        $maxPrice = $request->maxPrice;
        $products = Product::whereBetween('price', [$minPrice, $maxPrice])->get();
        // return view('frontend.search.price', compact('products'));
        return response()->json(['products' => $products]); 
    }

    public function index()
    {
        //
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
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
