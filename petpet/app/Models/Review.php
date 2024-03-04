<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Review extends Model
{
    // 리뷰
    use HasFactory;

    protected $fillable = ['text', 'rating', 'user_id', 'product_id'];

    public function user(): BelongsTo
    {
        //reviews 테이블의 user_id
        return $this->belongsTo(User::class);
    } 
}
