<?php

namespace App\Models\Frontend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class BlogMember extends Model
{
    use HasFactory;
    protected $table = 'blog';

    protected $fillable = ['title','image','description','created_at','updated_at'];
    public $timestamps = true;

    public function comment(){
        return $this->hasMany(BlogCmt::class,'blog_id','id');
    }
    public function getBlog(){
        // $blog = DB::select('SELECT * FROM blog ORDER BY created_at DESC');
        // return $blog;
        return $this->query();
    }
    public function detailBlog($id){
        return DB::select('SELECT * FROM '.$this->table.' WHERE id = ?', [$id]);
    }
}
