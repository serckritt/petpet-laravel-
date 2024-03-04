<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Cart extends Model
{
    //장바구니
    use HasFactory;

    protected $fillable = ['product_id', 'user_id', 'count'];

    public function product(): BelongsTo
    {
        // carts 테이블의 product_id
        return $this->belongsTo(Product::class);
    }
}
