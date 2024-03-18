<?php

namespace App\Models\Frontend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class Register extends Model
{
    use HasFactory;
    protected $table = 'users';
    public function registerMember($data){
        DB::insert('INSERT INTO users (name, email, password, phone, address, id_country, avatar, level, created_at) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)
        ', $data);
    }
}
