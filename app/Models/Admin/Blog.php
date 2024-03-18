<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class Blog extends Model
{
    use HasFactory;
    protected $table = 'blog';

    protected $fillable = ['title','image','description','created_at','updated_at'];
    public $timestamps = true;

    public function comment(){
        return $this->hasMany(BlogCmt::class,'blog_id','id');
    }
    public function getBlog(){
        $blog = DB::select('SELECT * FROM blog');
        return $blog;
    }
    public function addBlog($data){
        DB::insert('INSERT INTO blog (title, image, description, created_at) VALUES (?, ?, ?, ?)', $data);
    }
    public function editBlog($id){
        return DB::select('SELECT * FROM '.$this->table.' WHERE id = ?', [$id]);
   }
    public function updateBlog($data, $id){
       $data[] = $id;
       return  DB::update('UPDATE '.$this->table.' SET title=?, image=?, description=?,  updated_at=? WHERE id=?', $data);
    }
    public function deleteBlog($id){
        return DB::delete("DELETE FROM $this->table WHERE id=?", [$id]);
    }

}
