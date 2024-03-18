<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Hash;

use Auth;
use App\Models\User;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use Image;
use App\Models\Admin\AdminModel;
use App\Models\History;
use Mail;
use App\Mail\MailNotify;
use App\Models\Frontend\Register;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\MemberLoginRequest;

class CheckoutController extends Controller
{
    private $user;
    private $country;
    public function __construct(){
        $this->user = new User();
        $this->country = new AdminModel();
    }
    /**
     * Display a listing of the resource.
     */
    public function checkout(){
        $countryList = $this->country->getCountry();
        return view('frontend.checkout', compact('countryList'));
    }

    public function sendmail(Request $request){
        $data = session('cart');
        $price = 0;
        foreach($data as $item){
            $price += $item['qty'] * $item['price'];
        }
        try{
            Mail::to(Auth::user()->email)->send(new MailNotify($data));
            $history = [
                'email' => Auth::user()->email,
                'phone' => Auth::user()->phone,
                'name' => Auth::user()->name,
                'id_user' => Auth::user()->id,
                'price' => $price,
            ];
            //dd($history);
            History::create($history);
            return redirect('/')->with('msg', ('Xác nhận đơn hàng thành công, vui lòng check mail.'));
        }catch(Exception $th){
            return redirect('/')->withErrors('Gửi mail thất bại.');
        }
    }

    public function login(MemberLoginRequest $request){
        $login = [
            'email' => $request->email,
            'password' => $request->password,
            'level' => 0
        ];
        $remember = false;
        if($request->remember_me){
            $remember = true;
        }
        //dd($login);
        //dd($remember);
        if(Auth::attempt($login, $remember)){
            return redirect('/checkout')->with('msg', ('Đăng nhập thành côngg.'));
        }else {
            return redirect('/checkout')->withErrors('Đăng nhập thất bại.');
        }
    }

    public function register(RegisterRequest $request){
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone' => $request->phone,
            'address' => $request->address,
            'id_country' => $request->id_country,
            'avatar' => $request->avatar,
            'level' => $request->level = 0,
            'created_at' => date('y-m-d H:i:s')
        ];
        $this->user->create($data);
        return redirect('/checkout')->with('msg', 'Member registration successful');
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
