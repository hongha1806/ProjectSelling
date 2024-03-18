<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Contracts\Validation\Rule;
use App\Models\Admin\AdminModel;
use Auth;
use App\Models\User;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use Image;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    private $country;
    public function __construct()
    {
        // $this->middleware('auth');
        $this->country = new AdminModel();
        $this->product = new Product();
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
            $products = Product::orderBy('created_at', 'desc')->take(6)->get();
            return view('frontend.home', compact('products'));
    }

    public function detail($id){
        $products = $this->product->editproduct($id);
        //dd($products);
        return view('frontend.productdetail', compact('products'));
    }
    
}
