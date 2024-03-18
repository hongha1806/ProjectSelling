<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class Rate extends Model
{
    use HasFactory;
    protected $table = 'rates';
    protected $fillable = [
        'rate',
        'user_id',
        'blog_id',
        'created_at',
        'updated_at'
    ];
    public $timestamps = true;
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function blog()
    {
        return $this->belongsTo(Blog::class);
    }
}
