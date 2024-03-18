<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class UserModel extends Model
{
    use HasFactory;
    protected $table = 'users';
    public function edit($id){
        return DB::select('SELECT * FROM '.$this->table.' WHERE id = ?', [$id]);
   }
    public function update($data){
        $data[] = $id;
        return  DB::update('UPDATE '.$this->table.' SET name=?, email=?, password=?, phone=?, address=?, avatar=?, avatar=?, updated_at=? WHERE id = ?', $data);
    }
}
