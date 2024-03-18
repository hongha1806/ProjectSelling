<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $fillable = [
        'user_id',
        'name',
        'price',
        'category_id',
        'brand_id',
        'status',
        'sale',
        'company',
        'hinhanh',
        'detail',
    ];
    public $timestamps = true;
    public function editproduct($id){
        return DB::select('SELECT * FROM '.$this->table.' WHERE id = ?', [$id]);
   }
   public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function brand()
{
    return $this->belongsTo(Brand::class);
}
//    public function update($data, $id){
//        $data[] = $id;
//        return  DB::update('UPDATE '.$this->table.' SET user_id=?, name=?, price=?, category_id=?, brand_id=?, status=?, sale=?, company=?, hinhanh=?, detail=?, updated_at=? WHERE id = ?', $data);
//    }
    // public function deleteproduct($id){
    //     return DB::delete("DELETE FROM $this->table WHERE id=?", [$id]);
    // }
}
