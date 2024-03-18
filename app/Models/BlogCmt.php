<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class BlogCmt extends Model
{
    use HasFactory;
    protected $table = 'blogcmt';
    protected $fillable = [
        'cmt',
        'user_id',
        'blog_id',
        'avatar',
        'name',
        'level',
        'cmt_id',
        'created_at',
        'updated_at'
    ];
    public $timestamps = true;
}
