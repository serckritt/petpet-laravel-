<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Record extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['product_id', 'user_id', 'postcode', 'count', 'address', 'delivery_request', 'credit_card', 'installment'];

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
