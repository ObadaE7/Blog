<?php

namespace App\Livewire\Home\Pages;

use App\Models\Category;
use Livewire\{Component, WithPagination};

class ArticlesByCategory extends Component
{
    use WithPagination;

    public $slug;

    public function mount($slug)
    {
        $this->slug = $slug;
    }

    public function getArticlesByCategory()
    {
        $category = Category::where('slug', $this->slug)->firstOrFail();
        $articles = $category->articles()->withCount(['reactions as likes_count' => function ($query) {
            $query->where('type', 1);
        }])->paginate(4);

        return compact('category', 'articles');
    }

    public function render()
    {
        $data = $this->getArticlesByCategory();

        return view('pages.home.pages.articles-by-category', compact('data'))
            ->layout('layouts.guest')
            ->title(trans('index.title.Articles by category', ['category' =>  $data['category']->name]));
    }
}
