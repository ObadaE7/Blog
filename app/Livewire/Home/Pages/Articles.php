<?php

namespace App\Livewire\Home\Pages;

use App\Models\Article;
use Livewire\{Component, WithPagination};

class Articles extends Component
{
    use WithPagination;

    public $search;

    public function getArticles()
    {
        return Article::where('title', 'like', "%{$this->search}%")->paginate(5);
    }

    public function render()
    {
        $articles = $this->getArticles();
        return view('pages.home.pages.articles', compact('articles'))
            ->layout('layouts.guest')
            ->title(trans('index.title.Articles'));
    }
}
