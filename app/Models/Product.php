<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table;
    protected $fillable = ['name', 'description', 'brand_id', 'category_id', 'price', 'sale_price', 'image'];
    protected $casts = [
        'updated_at' => 'datetime',
        'created_at' => 'datetime'
    ];
    public function brand(){
        return $this->belongsTo(Brand::class, 'brand_id');
    }
    public function category(){
        return $this->belongsTo(Category::class, 'category_id');
    }
}
