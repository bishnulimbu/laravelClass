<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'price', 'image', 'brand_id', 'category_id', 'stock', 'quantity', 'color', 'size'];

    public function brand()
    {
        $this->hasOne(Brand::class);
    }
}
