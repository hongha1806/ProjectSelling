<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class AdminModel extends Model
{
    use HasFactory;
    protected $table = 'country';

    public function getCountry(){
        $country = DB::select('SELECT * FROM country');
        return $country;
    }
    public function addCountry($data){
        DB::insert('INSERT INTO country (name, created_at) VALUES (?, ?)
        ', $data);
    }
    public function editcountry($id){
         return DB::select('SELECT * FROM '.$this->table.' WHERE id = ?', [$id]);
    }
    public function updateCountry($data, $id){
        $data[] = $id;
        return  DB::update('UPDATE '.$this->table.' SET name=?, updated_at=? WHERE id = ?', $data);
    }
    public function deletecountry($id){
        return DB::delete("DELETE FROM $this->table WHERE id=?", [$id]);
    }
}
