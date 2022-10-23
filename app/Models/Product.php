<?php

namespace App\Models;



use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $fillable = [
        'name',
        'slug',
        'brand',
        'small_description',
        'description',
        'original_price',
        'selling_price',
        'quantity',
        'trending',
        'status',
        'meta_title',
        'meta_keyword',
        'meta_description'
      
    ];
    public function productImages()
    {
            return $this->hasMany(productImage::class, 'product_id', 'id');
    }
    public function category()
    {
            return $this->belongsTo(Category::class, 'category_id', 'id');
    }
}