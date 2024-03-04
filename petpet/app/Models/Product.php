<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    //상품
    use HasFactory;

    public function category(): BelongsTo
    {
        //products 테이블의 category_id
        return $this->belongsTo(Category::class);
    }

    public function reviews(): HasMany
    {
        //reviews 테이블의 products_id
        return $this->hasMany(Review::class);
    }
}
