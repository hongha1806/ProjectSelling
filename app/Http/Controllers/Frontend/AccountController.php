<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Contracts\Validation\Rule;
use Auth;
use App\Models\User;
use App\Models\Admin\AdminModel;
use App\Http\Requests\AdminRequest;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    private $user;
    private $country;
    public function __construct(){
        $this->user = new User();
        $this->country = new AdminModel();
    }

    public function account(){
        $countryList = $this->country->getCountry();
        return view('frontend.account', compact('countryList'));
    }
    public function postAccount(AdminRequest $request){
        $userId = Auth::user()->id;
        $user = User::findOrFail($userId);
        $data = $request->all();
        $file = $request->avatar;
        if(!empty($file)){
            $data['avatar'] = $file->getClientOriginalName();
        }
        if ($data['password']) {
            $data['password'] = bcrypt($data['password']);
        }else{
            $data['password'] = $user->password;
        }
        if ($user->update($data)) {
            if(!empty($file)){
                $file->move('upload/user/avatar', $file->getClientOriginalName());
            }
            return redirect()->back()->with('msg', 'Update account success.');
        } else {
            return redirect()->back()->withErrors('msg', 'Update account error.');
        }
        
    }

    public function index()
    {
        
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
