<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use App\Models\Brand;
use App\Models\Category;
use Illuminate\Http\JsonResponse;
use Intervention\Image\Facades\Image as Image;
use Illuminate\Support\Facades\Auth;

class ProductApiController extends Controller
{
    public $successStatus = 200;
    
    // 
    public function productHome(){
        $getProductHome = Product::orderBy('id')->limit(6)->get()->toArray();
        return response()->json([
            'response' => 'success',
            'data' => $getProductHome
        ], $this->successStatus);
    }

    // porduct list
    public function productList() {
        $getAllProduct = Product::paginate(6);
        return response()->json([
            'response' => 'success',
            'data' => $getAllProduct
        ], $this->successStatus); 
    }

    public function detail($id)
    {
        $data = Product::findOrFail($id);
        return response()->json([
            'response' => 'success',
            'data' => $data
        ], $this->successStatus);
       
    }
    
    /**
     * Display a listing of the resource.
     */
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
