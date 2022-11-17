<?php

namespace App\View\Components;

use App\Models\Category;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\View\Component;

class FormCategoryDropdown extends Component
{
    /**
     * @param Collection|Category[] $categories
     */
    public function render(): View
    {
        return view('components.forms.form-category-dropdown',['categories'=>Category::all()]);
    }
}
