<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Contracts\Validation\Rule;
use Auth;
use App\Models\Admin\Blog;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    private $blog;
    public function __construct(){
        $this->middleware('auth');
        $this->blog = new Blog();
    }

    // hiển thị list blog
    public function blog(){
        $blogList = $this->blog->getBlog();
        return view('admin.blog.list', compact('blogList'));
    }

    // thêm blog
    public function add(){
        return view('admin.blog.add');
    }
    public function postAdd(Request $request){
        $request->validate([
            'title' => 'required',
            'image' => 'max:2048'
        ], [
            'title.required' => 'Name is required to be entered',
            'image.max' => 'Image nhỏ hơn :max'
        ]);
        $dataInsert = $request->all();
        $file = $request->image;
        if(!empty($file)){
            $dataInsert['image'] = $file->getClientOriginalName();
        }
        if ($this->blog->create($dataInsert)) {
            if(!empty($file)){
                $file->move('upload/user/avatar', $file->getClientOriginalName());
            }
            return redirect()->route('blog.add')->with('msg', 'Create A Successful Blog.');
        } else {
            return redirect()->back()->withErrors('msg', 'Create a error blog.');
        }
    }

    //update blog
    public function edit(Request $request, $id=0){
        if(!empty($id)){
            $blogUpdate = $this->blog->editBlog($id);
            if(!empty($blogUpdate[0])){
                $request->session()->put('id', $id);
                $blogUpdate = $blogUpdate[0];

            }else {
                return redirect()->route('blog.list')->with('msg', 'This blog is not bad at all');
            }
        }else{
            return redirect()->route('blog.list')->with('msg', 'Not bad link at');
        }
        return view('admin.blog.edit', compact('blogUpdate'));
    }
    public function postEdit(Request $request){
        $id = session('id');
        $request->validate([
            'title' => 'required',
            'image' => 'max:2048'
        ], [
            'title.required' => 'Name is required to be entered',
            'image.max' => 'Image nhỏ hơn :max'
        ]);
        if(empty($id)){
            return back()->with('msg', 'Not bad link at');
        }
        $file = $request->image;
        $dataInsert = $request->all();
        if(!empty($file)){
            $dataInsert['image'] = $file->getClientOriginalName();
        }
        if ($this->blog->updateBlog($dataUpdate, $id)) {
            if(!empty($file)){
                $file->move('upload/user/avatar', $file->getClientOriginalName());
            }
            return redirect()->route('blog.edit', ['id'=>$id])->with('msg','Updated blog successfully');
        } else {
            return redirect()->back()->withErrors('msg', 'Update a error blog.');
        }
    }

    //xoa blog
    public function delete($id=0){
        if(!empty($id)){
            $blogUpdate = $this->blog->editBlog($id);
            if(!empty($blogUpdate[0])){
                $delete = $this->blog->deleteBlog($id);
                if($delete){
                    $msg = 'Deleted blog successfully';
                }else {
                    $msg = 'Cannot delete blog';
                }
            }else {
                $msg = 'Blog is not bad at';
            }
        }else{
            $msg = 'Not bad link at';
        }
        return redirect()->route('blog.list')->with('msg', $msg);
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
