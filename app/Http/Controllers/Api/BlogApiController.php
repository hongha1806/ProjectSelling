<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Contracts\Validation\Rule;
use Auth;
use App\Models\User;
use App\Models\Frontend\BlogMember;
use App\Models\Rate;
use App\Models\BlogCmt;

class BlogApiController extends Controller
{

    private $blog;
    public function __construct(){
        $this->blog = new BlogMember();
        $this->rate = new Rate();
    }
    // blog list member
    public function list(){
        $blogList = $this->blog->getBlog()->orderBy('created_at', 'desc')->paginate(3);
        //return view('frontend.blog.bloglist', compact('blogList'));
        return response()->json(['blogList'=> $blogList]);
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
