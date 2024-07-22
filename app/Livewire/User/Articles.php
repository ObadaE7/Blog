<?php

namespace App\Livewire\User;

use App\Models\Article;
use App\Traits\FilterTrait;
use Livewire\{Component, WithPagination};

class Articles extends Component
{
    use WithPagination, FilterTrait;

    public function getArticles()
    {
        return Article::where('user_id', auth()->id())
            // ->withCount([
            //     'reactions as likes_count' => function ($query) {
            //         $query->where('type', 1);
            //     },
            //     'reactions as dislikes_count' => function ($query) {
            //         $query->where('type', 0);
            //     },
            // ])
            ->where($this->searchBy, 'like', "%{$this->search}%")
            ->orderBy($this->orderBy, $this->orderDir)
            ->paginate($this->perPage);
    }

    public function render()
    {
        $articles = $this->getArticles();
        $columns = ['title', 'subtitle'];
        $perPages = [5, 10];

        return view('pages.dashboard.articles', compact('articles', 'columns', 'perPages'))
            ->extends('layouts.dashboard')
            ->section('content');
    }
}
