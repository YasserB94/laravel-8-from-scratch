<?php

namespace App\View\Components;

use App\Models\Category;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CreatePostForm extends Component
{
    public function render(): View
    {
        return view('components.posts.create-post-form',[
            'categories'=>Category::all(),
        ]);
    }
}
