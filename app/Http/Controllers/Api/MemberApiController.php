<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Hash;

use Auth;
use App\Http\Requests\Api\LoginRequest;
use App\Http\Requests\Api\MemberRequest;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Intervention\Image\Facades\Image as Image;
use App\Http\Requests\api\UpdateProfileRequest;


use App\Http\Requests\frontend\MemberLoginRequest;


class MemberApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     public $successStatus = 200;

     public function postDangNhap(LoginRequest $request){
        $login = [
            'email' => $request->email,
            'password' => $request->password,
            'level' => 0
        ];
        //var_dump($login);
        $remember = false;
        if ($request->remember_me) {
            $remember = true;
        }
        //var_dump($remember);
        if ($this->doLogin($login, $remember)) {
             $user = Auth::user(); 
             $token = $user->createToken('authToken')->plainTextToken;
             return response()->json([
                    'success' => 'success',
                    'token' => $token, 
                    'Auth' => Auth::user()
                ], 
                $this->successStatus
            ); 
        } else {
            return response()->json([
                    'response' => 'error',
                    'errors' => ['errors' => 'invalid email or password'],
                ],
                $this->successStatus); 
        }
    }

    protected function doLogin($attempt, $remember)
    {
        
        if (Auth::attempt($attempt, $remember)) {
            return true;
        } else {
            return false;
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }

    public function register(MemberRequest $request)
    {
        echo 11;
        $user = User::All()->toArray();
        $data = $request->all();
        $file = $request->get('avatar');
        if($file) {
           $image = $file;
           $name = time().'.' . explode('/', explode(':', substr($image, 0, strpos($image, ';')))[1])[1];
           $data['avatar'] = $name;
        }
        
        $data['password'] = bcrypt($data['password']);
        if ($getUser = User::create($data)) {
            if($file){
                Image::make($file)->save(public_path('upload/user/avatar/').$data['avatar']);
            }
            return response()->json([
                'message' => 'success',
                $getUser
            ], JsonResponse::HTTP_OK);
        } else {
            return response()->json(['errors' => 'error sever'], JsonResponse::HTTP_UNPROCESSABLE_ENTITY);
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
