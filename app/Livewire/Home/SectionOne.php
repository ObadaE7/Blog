<?php

namespace App\Livewire\Home;

use App\Models\{Article, Category};
use Livewire\Component;

class SectionOne extends Component
{
    public function getCategory()
    {
        return Category::withCount('articles')
            ->orderByDesc('articles_count')
            ->first();
    }

    public function getRandomArticles()
    {
        return Article::inRandomOrder()->take(6)->get();
    }

    public function getTopArticles()
    {
        return Article::withCount([
            'reactions as likes_count' => function ($query) {
                $query->where('type', 1);
            }
        ])
            ->orderByDesc('likes_count')
            ->take(4)
            ->get();
    }

    public function render()
    {
        $category = $this->getCategory();
        $randomArticles = $this->getRandomArticles();
        $topArticles = $this->getTopArticles();

        return view('pages.home.section-one', compact('category', 'randomArticles', 'topArticles'));
    }
}
