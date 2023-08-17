<?php

namespace App\Http\View\Composers;

use App\Models\Categories;
use Illuminate\View\View;

class CategoryComposer
{
    /**
     * Create a new profile composer.
     */
    public function __construct()
    {
    }

    /**
     * Bind data to the view.
     */
    public function compose(View $view): void
    {
        $categories = Categories::select('id', 'slug', 'category_name', 'parent_id')->orderByDesc('id')->where('parent_id', 0)->get();
        $view->with('categories', $categories);
    }
}
