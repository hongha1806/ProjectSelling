<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Auth;

use Illuminate\Contracts\Validation\Rule;
use Auth;
use App\Models\User;
use App\Models\Frontend\BlogMember;
use App\Models\Rate;
use App\Models\BlogCmt;

class BlogMemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    private $blog;
    public function __construct(){
        $this->blog = new BlogMember();
        $this->rate = new Rate();
    }

    // blog list member
    public function list(){
        $blogList = $this->blog->getBlog()->orderBy('created_at', 'desc')->paginate(3);
        return view('frontend.blog.bloglist', compact('blogList'));
        //return response()->json(['blogList'=> $blogList]);
    }
    public function detail(Request $request, $id, $blog_id=0){
        $blogList = $this->blog->detailBlog($id);
        if (!empty($blogList)) {
            $request->session()->put('id', $id);
            $blogList = $blogList;
            //dd($blogList);
            // Lấy bài viết trước và sau
            $previousPost = $this->blog->getBlog()->where('id', '<', $id)->orderBy('id', 'desc')->first();
            $nextPost = $this->blog->getBlog()->where('id', '>', $id)->orderBy('id', 'asc')->first();
            $cmt = BlogCmt::where('blog_id',$id)->get();
            return view('frontend.blog.detail', compact('blogList', 'previousPost', 'nextPost', 'cmt'));
        }
    }

    // blog rate
    public function rate(Request $request){
        $rate = $request->input('rate');
        $userId = Auth::user()->id;
        $blogId = $request->input('blog_id');
        
        // Kiểm tra xem người dùng đã đánh giá bài viết này trước đó chưa
        $existing = Rate::where('user_id', $userId)
                            ->where('blog_id', $blogId)
                            ->first();
        if ($existing) {
            // Nếu người dùng đã đánh giá, cập nhật điểm đánh giá mới
            $existing->rate = $rate;
            $existing->save();
        } else {
            // Nếu người dùng chưa đánh giá, tạo một bản ghi mới trong bảng "rate"
            $rating = new Rate();
            $rating->user_id = $userId;
            $rating->blog_id = $blogId;
            $rating->rate = $rate;
            $rating->save();
        }
        // Tính điểm trung bình
        $averageRate = Rate::where('blog_id', $blogId)->avg('rate');
        // Làm tròn điểm trung bình
        $roundedRate = round($averageRate);
        // Trả về kết quả cho yêu cầu Ajax và hiển thị 
        return response()->json(['averageRate'=> $roundedRate]);
    }

    //blog cmt

    public function cmt(Request $request){
        $cmt = new BlogCmt();
        $request->validate([
            'cmt' => 'required'
        ], [
            'cmt.required' => 'Comment is required to be entered'
        ]);
        $cmt->cmt = $request['cmt'];
        $cmt->user_id = Auth::user()->id;
        $cmt->blog_id = $request['blog_id'];
        $cmt->avatar = Auth::user()->avatar;
        $cmt->name = Auth::user()->name;
        $cmt->level = $request['level'];
        $cmt->save();
        //hiển thị
        $blogcmt = BlogCmt::where('blog_id', $request['blog_id'])->get();
        //dd($blogCmt);
        return response()->json(['data'=> $blogcmt]);
    }

    public function reply(Request $request){
        $cmt = new BlogCmt();
        $request->validate([
            'cmt' => 'required'
        ], [
            'cmt.required' => 'Comment is required to be entered'
        ]);
        $cmt->cmt = $request['cmt'];
        $cmt->user_id = Auth::user()->id;
        $cmt->blog_id = $request['blog_id'];
        $cmt->avatar = Auth::user()->avatar;
        $cmt->name = Auth::user()->name;
        $cmt->level = $request['level'];
        $cmt->save();
        //hiển thị
        $blogcmt = BlogCmt::where('blog_id', $request['blog_id'])->where('level', $request['level'])->get();
        //dd($blogCmt);
        return response()->json(['data'=> $blogcmt]);
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
