<?php

namespace App\View\Components;

use App\Models\Category as ModelsCategory;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Category extends Component
{
    /**
     * Create a new component instance.
     */
    public $categories;
    

    public function __construct()
    {
        //컴포넌트에서 카테고리 모델을 호출
        
        $this->categories = ModelsCategory::where('parent_id',0) //최상위 카테고리만 따로 불러냄
            ->with('child', 'child.child')      //지연로딩 방지
            ->get();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.category');
    }
}
