<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Hash;

use Auth;
use App\Models\Admin\AdminModel;
use App\Models\Frontend\Register;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\MemberLoginRequest;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    private $user;
    private $country;
    public function __construct()
    {
        $this->user = new Register();
        $this->country = new AdminModel();
    }
    
    // đăng ký
     public function register(){
        $countryList = $this->country->getCountry();
        return view('frontend.register', compact('countryList'));
    }
    public function postDangKy(RegisterRequest $request){
        $data = [
            $request->name,
            $request->email,
            Hash::make($request->password),
            $request->phone,
            $request->address,
            $request->id_country,
            $request->avatar,
            $request->level = 0,
            date('y-m-d H:i:s')
        ];
        $this->user->registerMember($data);
        return redirect()->route('dangnhap')->with('msg', 'Member registration successful');
    }

    //đăng nhập
    public function login(){
        return view('frontend.login');
    }
    public function postDangNhap(MemberLoginRequest $request){
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
            return redirect('/');
        }else {
            return redirect()->back()->with('msg', 'Email hoặc mật khẩu không đúng.');
        }


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
