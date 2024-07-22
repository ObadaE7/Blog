<?php

namespace App\Livewire\Home;

use App\Models\Category;
use Livewire\Component;

class SectionTwo extends Component
{
    public function getCategories()
    {
        return Category::withCount('articles')
            ->orderBy('articles_count', 'desc')
            ->skip(1)
            ->take(3)
            ->get();
    }
    public function render()
    {
        $categories = $this->getCategories();

        return view('pages.home.section-two', compact('categories'));
    }
}
