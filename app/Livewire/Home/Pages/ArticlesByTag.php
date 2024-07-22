<?php

namespace App\Livewire\Home\Pages;

use App\Models\Tag;
use Livewire\{Component, WithPagination};

class ArticlesByTag extends Component
{
    use WithPagination;

    public $slug;

    public function mount($slug)
    {
        $this->slug = $slug;
    }

    public function getArticlesByTag()
    {
        $tag = Tag::where('slug', $this->slug)->firstOrFail();
        $articles = $tag->articles()->withCount(['reactions as likes_count' => function ($query) {
            $query->where('type', 1);
        }])->paginate(4);

        return compact('tag', 'articles');
    }

    public function render()
    {
        $data = $this->getArticlesByTag();

        return view('pages.home.pages.articles-by-tag', compact('data'))
            ->layout('layouts.guest')
            ->title(trans('index.title.Articles by tag', ['tag' =>  $data['tag']->name]));
    }
}
