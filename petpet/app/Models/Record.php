<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Record extends Model
{
    //구매기록
    use HasFactory;
    use SoftDeletes; //소프트삭제 사용

    protected $fillable = ['product_id', 'user_id', 'postcode', 'count', 'address', 'delivery_request', 'credit_card', 'installment'];

    public function product(): BelongsTo
    {
        //records 테이블의 products_id
        return $this->belongsTo(Product::class);
    }
}
