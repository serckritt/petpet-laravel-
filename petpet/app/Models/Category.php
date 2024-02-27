<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;

    public function child(): HasMany
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    public function children()
    {
        return Category::select('id')
            ->whereIn(
                'parent_id', Category::select('id')
                    ->where('parent_id', $this->id)
            );
    }

    public function parent(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    public function product(): HasMany
    {
        return $this->hasMany(Product::class);
    }
}
