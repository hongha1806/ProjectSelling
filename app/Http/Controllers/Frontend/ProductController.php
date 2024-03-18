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

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    private $user;
    public function __construct(){
        $this->middleware('auth');
        $this->user = new User();
        $this->product = new Product();
    }
    // danh sách myproduct
    public function myproduct(){
        $user_id = Auth::user()->id;
        $products = Product::where('user_id', $user_id)->get();
        //$getProducts = Product::find(1)->toArray();
    	//$getArrImage = json_decode($getProducts['filename'], true);
        return view('frontend.product.myproduct', compact('products'));
    }

    public function add(){
        $category = Category::all();
        $brand = Brand::all();
        return view('frontend.product.add', compact('category', 'brand'));
    }
    public function postAdd(Request $request){
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'hinhanh.*' => 'image|max:1024',
        ], [
            'name.required' => 'Tên bắt buộc phải nhập',
            'price.required' => 'Giá bắt buộc phải nhập',
            'hinhanh.image' => 'Hình ảnh không đúng định dạng',
            'hinhanh.max' => 'Hình ảnh phải < :max',
        ]);
        $product = new Product();
        $product->user_id = Auth::user()->id;
        $product->name = $request->name;
        $product->price = $request->price;
        $product->category_id = $request->category_id;
        $product->brand_id = $request->brand_id;
        $product->status = $request->status;
        $product->sale = $request->sale;
        $product->company = $request->company;
        $product->detail = $request->detail;
        $product->save();


        //Xử lý upload và sao chép hình ảnh
        if($request->hasfile('hinhanh'))
        {
            foreach($request->file('hinhanh') as $image)
            {

                $name = $image->getClientOriginalName();
                $name_2 = "2".$image->getClientOriginalName();
                $name_3 = "3".$image->getClientOriginalName();

                //$image->move('upload/product/', $name);
                
                $path = public_path('upload/product/' . $name);
                $path2 = public_path('upload/product/' . $name_2);
                $path3 = public_path('upload/product/' . $name_3);

                Image::make($image->getRealPath())->save($path);
                Image::make($image->getRealPath())->resize(85, 84)->save($path2);
                Image::make($image->getRealPath())->resize(329, 380)->save($path3);
                
                $data[] = $name;
            }
        }
        $product->hinhanh=json_encode($data);
        $product->save();

        return redirect()->route('product.list')->with('msg', 'Product created successfully.');
    }

    public function edit($id){
        $category = Category::all();
        $brand = Brand::all();
        $productUpdate = Product::find($id);
        return view('frontend.product.edit', compact('productUpdate', 'category', 'brand'));
    }

    public function postEdit(Request $request, $id){
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'hinhanh.*' => 'image|max:1024',
        ], [
            'name.required' => 'Tên bắt buộc phải nhập',
            'price.required' => 'Giá bắt buộc phải nhập',
            'hinhanh.image' => 'Hình ảnh không đúng định dạng',
            'hinhanh.max' => 'Hình ảnh phải < :max',
        ]);
       
        // Lấy sản phẩm cần cập nhật
        $product = Product::get($id);
        $currentImages = json_decode($product->hinhanh);
        $deleteImages = $request->delete_images;
        $newImages = $request->file('hinhanh');
        $totalImages = 0;
        if (isset($newImages)) {
            $totalImages += count($newImages);
        }
        if (isset($currentImages)) {
            $totalImages += count($currentImages);
        }
        if (isset($deleteImages)) {
            $totalImages -= count($deleteImages);
        }

        if ($totalImages > 3) {
            return redirect()->back()->withErrors(['hinhanh'=> 'Số lượng hình ảnh không quá 3.']);
        }
        if (!empty($deleteImages)) {
            foreach ($deleteImages as $deleteImage) {
                if (in_array($deleteImage, $currentImages)) {
                    $key = array_search($deleteImage, $currentImages);
                    unset($currentImages[$key]);
                    $currentImages = array_values($currentImages);
                }
            }
        }
        if(!empty($newImages))
        {
            foreach($newImages as $image)
            {

                $name = $image->getClientOriginalName();
                $name_2 = "2".$image->getClientOriginalName();
                $name_3 = "3".$image->getClientOriginalName();

                //$image->move('upload/product/', $name);
                
                $path = public_path('upload/product/' . $name);
                $path2 = public_path('upload/product/' . $name_2);
                $path3 = public_path('upload/product/' . $name_3);

                Image::make($image->getRealPath())->save($path);
                Image::make($image->getRealPath())->resize(85, 84)->save($path2);
                Image::make($image->getRealPath())->resize(329, 380)->save($path3);
                
                $data[] = $name;
            }
        }
        $product->hinhanh=json_encode($data);
        $product->user_id = Auth::user()->id;
        $product->name = $request->name;
        $product->price = $request->price;
        $product->category_id = $request->category_id;
        $product->brand_id = $request->brand_id;
        $product->status = $request->status;
        $product->sale = $request->sale;
        $product->company = $request->company;
        $product->detail = $request->detail;
        $product->save();
        
        return redirect()->route('product.list')->with('msg', 'Cập nhật sản phẩm thành công');
    }

    public function delete($id){
        $product = Product::find($id);
        if ($product) {
            $product->delete();
        }
        return redirect()->back();
    }

    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */


    

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
