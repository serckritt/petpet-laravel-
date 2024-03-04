<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    //카테고리
    use HasFactory;

    public function child(): HasMany
    {
        //자신을 parent_id로 가지고 있는 하위카테고리 호출
        return $this->hasMany(Category::class, 'parent_id');
    }

    public function children()
    {
        //최상위 카테고리에만 사용, 하위의 하위 카테고리를 모두 가져옴 
        return Category::select('id')
            ->whereIn(
                'parent_id', Category::select('id')
                    ->where('parent_id', $this->id)
            );
    }

    public function parent(): BelongsTo
    {
        //자신의 parent_id에 해당하는 상위카테고리 호출
        return $this->belongsTo(Category::class, 'parent_id');
    }

    public function product(): HasMany
    {
        //products 테이블의 category_id
        return $this->hasMany(Product::class);
    }
}
