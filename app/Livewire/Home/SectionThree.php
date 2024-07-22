<?php

namespace App\Livewire\Home;

use App\Models\{Article, Category, Tag};
use Livewire\Component;
use Livewire\WithPagination;

class SectionThree extends Component
{
    use WithPagination;
    public $search;
    public $perPage = 4;

    public function getCategories()
    {
        return Category::where('name', 'like', "%{$this->search}%")
            ->inRandomOrder()
            ->take(6)
            ->get();
    }

    public function getCategoriesCount()
    {
        return Category::count();
    }

    public function getLatestArticles()
    {
        return Article::orderByDesc('created_at')->paginate($this->perPage);
    }

    public function loadMore()
    {
        $this->perPage += 4;
    }

    public function getTopTags()
    {
        return Tag::withCount('articles')
            ->orderByDesc('articles_count')
            ->take(20)
            ->get();
    }

    public function render()
    {
        $categories = $this->getCategories();
        $categoriesCount = $this->getCategoriesCount();
        $latestArticles = $this->getLatestArticles();
        $topTags = $this->getTopTags();

        return view('pages.home.section-three', compact(
            'categories',
            'categoriesCount',
            'latestArticles',
            'topTags'
        ));
    }
}
