<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class History extends Model
{
    use HasFactory;
    protected $table = 'history';
    protected $fillable = [
        'email',
        'phone',
        'name',
        'id_user',
        'price',
    ];
    public $timestamps = true;
}
