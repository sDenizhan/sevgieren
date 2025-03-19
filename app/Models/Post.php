<?php

namespace App\Models;

use App\Traits\WithSEO;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Post extends Model
{
    use HasFactory;
    use WithSEO;

    protected $casts = [
        'seo' => 'array'
    ];

    // protected $appends = ['next', 'previous'];

    public function category(): BelongsTo{
        return $this->belongsTo(PostCategory::class);
    }

    public function comments(): HasMany {
        return $this->hasMany(PostComment::class)->where(['status' => 1]);
    }

    // //next record
    // public function getNextAttribute() {
    //     return $this->where('id', '>', $this->id)->orderBy('id', 'asc')->first();
    // }

    // //previous record
    // public function getPreviousAttribute() {
    //     return $this->where('id', '<', $this->id)->orderBy('id', 'desc')->first();
    // }

}
