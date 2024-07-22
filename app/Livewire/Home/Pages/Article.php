<?php

namespace App\Livewire\Home\Pages;

use App\Events\ArticleReactionEvent;
use App\Models\{Article as ArticleModel, Category, Comment, Reaction, Tag};
use App\Notifications\ArticleReactionsNotification;
use Illuminate\Support\Facades\{Auth, Notification};
use Livewire\Attributes\On;
use Livewire\Component;

class Article extends Component
{
    public $slug;
    public $search;

    public function mount($slug)
    {
        $this->slug = $slug;
    }

    public function getArticle()
    {
        return ArticleModel::withCount([
            'reactions as likes_count' => function ($query) {
                $query->where('type', 1);
            },
            'reactions as dislikes_count' => function ($query) {
                $query->where('type', 0);
            }
        ])
            ->where('slug', $this->slug)
            ->first();
    }

    public function getTopArticles()
    {
        return ArticleModel::withCount([
            'reactions as likes_count' => function ($query) {
                $query->where('type', 1);
            }
        ])
            ->orderByDesc('likes_count')
            ->take(4)
            ->get();
    }

    public function getRelatedArticles()
    {
        $article = $this->getArticle();
        return ArticleModel::where('user_id', $article->owner()->id)
            ->inRandomOrder()
            ->take(4)
            ->get();
    }

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

    public function getTopTags()
    {
        return Tag::withCount('articles')
            ->orderByDesc('articles_count')
            ->take(17)
            ->get();
    }

    #[On('updated-comment')]
    public function getCommentsCount()
    {
        $article = $this->getArticle();
        return Comment::where('article_id', $article->id)
            ->whereNull('parent_id')
            ->count();
    }

    private function toggleReaction($articleId, $type)
    {
        if (!Auth::check()) {
            return;
        }

        $user = Auth::user();
        $article = ArticleModel::find($articleId);

        $oppositeType = $type == 1 ? 0 : 1;

        Reaction::where('user_id', $user->id)
            ->where('type', $oppositeType)
            ->where('likable_id', $article->id)
            ->where('likable_type', get_class($article))
            ->delete();

        $existingReaction = Reaction::where('user_id', $user->id)
            ->where('type', $type)
            ->where('likable_id', $article->id)
            ->where('likable_type', get_class($article))
            ->first();

        if ($existingReaction) {
            $existingReaction->delete();
        } else {
            Reaction::create([
                'user_id' => $user->id,
                'type' => $type,
                'likable_id' => $article->id,
                'likable_type' => ArticleModel::class,
            ]);
            $reactionType = $type == 1 ? 'like' : 'dislike';
            if ($article->user->id !=  $user->id) {
                Notification::send($article->user, new ArticleReactionsNotification($article, $reactionType));
            }
        }
        $this->dispatch('push-reaction');
    }

    #[On('push-reaction')]
    public function notifyArticleReaction()
    {
        event(new ArticleReactionEvent());
    }

    public function like($id)
    {
        $this->toggleReaction($id, 1);
    }

    public function dislike($id)
    {
        $this->toggleReaction($id, 0);
    }

    public function render()
    {
        $article = $this->getArticle();
        $relatedArticles = $this->getRelatedArticles();
        $categories = $this->getCategories();
        $categoriesCount = $this->getCategoriesCount();
        $topTags = $this->getTopTags();
        $commentCount =  $this->getCommentsCount();
        $topArticles = $this->getTopArticles();

        return view('pages.home.pages.article', compact(
            'article',
            'topArticles',
            'relatedArticles',
            'categories',
            'categoriesCount',
            'topTags',
            'commentCount',
        ))
            ->layout('layouts.guest')
            ->title(trans('index.title.Article', ['article' =>  $article->title]));
    }
}
