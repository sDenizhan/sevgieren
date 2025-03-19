<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    use HasFactory;

    protected $casts = [
        'gallery' => 'array',
        'seo' => 'array',
        'data' => 'array'
    ];

    public function category(): BelongsTo {
        return $this->belongsTo(ProductCategory::class, 'category_id');
    }
}
