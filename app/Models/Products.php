<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'price', 'description', 'feature_image', 'shipping_cost', 'product_status'
    ];

    public function galleryImages()
    {
        return $this->hasMany(GalleryImages::class, 'product_id');
    }
}
