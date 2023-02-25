<?php

namespace App\View\Components;

use App\Models\Category;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class cardCarouselCategory extends Component
{
    /**
     * Create a new component instance.
     */
    public $category;
    public function __construct(int $id)
    {
        $this->category = Category::find($id);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.card-carousel-category')->with(['category' => $this->category]);
    }
}
