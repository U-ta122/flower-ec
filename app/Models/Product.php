<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'text',
        'price',
        'state',
        'shop_id',
        'image_url'
    ];

    public function shop()
    {
        return $this->belongsTo(Shop::class);
    }
}
