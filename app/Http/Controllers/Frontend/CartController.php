<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Contracts\Validation\Rule;

use Auth;
use App\Models\User;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use Image;

class CartController extends Controller
{

    private $user;
    public function __construct(){
        $this->user = new User();
    }

    public function add(Request $request){
        $id = $request['id'];
        $product = Product::where('id', $id)->first();
        $images = json_decode($product['hinhanh']);
        $image = $images[0];
        $cart = [
            'price' => $product->price,
            'image' => $image,
            'title' => $product->name,
            'qty' => 1
        ];
        if(session()->has('cart.'.$id)){
            // Nếu sản phẩm đã tồn tại trong session, tăng số lượng lên 1
            session()->increment('cart.'.$id.'.qty');
        } else {
            // Nếu sản phẩm chưa tồn tại trong session, thêm sản phẩm vào session
            session()->put('cart.'.$id, $cart);
        }
        return response()->json(['msg' => 'Sản phẩm đã được thêm vào giỏ hàng']);
    }
    public function showcart(){
        return view('frontend.cart');
    }
    public function tangcart(Request $request){
        $id = $request['id'];
        $cart = session('cart');
        foreach($cart as $key => $item) {
            if($id == $key) {
                $cart[$key]['qty'] += 1;
                break; 
            }
        }
        session(['cart' => $cart]);
        return response()->json();
    }
    public function giamcart(Request $request){
        $id = $request['id'];
        $cart = session('cart');
        foreach($cart as $key => $item) {
            if($id == $key) {
                $cart[$key]['qty'] -= 1;
                if ($cart[$key]['qty'] < 1) {
                    unset($cart[$key]);
                }
                break;
            }
        }
        session(['cart' => $cart]);
        return response()->json();
    }
    public function xoacart(Request $request){
        $id = $request['id'];
        $cart = session('cart');
        foreach($cart as $key => $item) {
            if($id == $key) {
                unset($cart[$key]);
                break;
            }
        }
        session(['cart' => $cart]);
        return response()->json();
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
