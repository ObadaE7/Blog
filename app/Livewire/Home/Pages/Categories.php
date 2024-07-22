<?php

namespace App\Livewire\Home\Pages;

use App\Models\Category;
use Livewire\{Component, WithPagination};

class Categories extends Component
{
    use WithPagination;

    public $search;

    public function getCategories()
    {
        return Category::withCount('articles')->where('name', 'like', "%{$this->search}%")->paginate(5);
    }

    public function render()
    {
        $categories = $this->getCategories();

        return view('pages.home.pages.categories', compact('categories'))
            ->layout('layouts.guest')
            ->title(trans('index.title.Categories'));
    }
}
