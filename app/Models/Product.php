<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'brand_id',
        'category_id',
        'subcategory_id',
        'subsubcategory_id',
        'product_name',
        'product_slug',
        'product_code',
        'product_quantity',
        'product_tags',
        'product_size',
        'product_color',
        'selling_price',
        'discount_price',
        'short_description',
        'long_description',
        'product_thumbnail',
        'hot_deals',
        'featured',
        'special_offer',
        'special_deals',
        'status',
    ];
}
