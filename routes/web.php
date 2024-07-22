<?php

use App\Livewire\Home\Index;
use App\Livewire\Home\Pages\{AboutUs, Articles, Article, ArticlesByCategory, ArticlesByTag, Categories, ContactUs, PrivacyPolicy, Writers};
use App\Livewire\User\{Profile, Analysis, Articles as UserArticles, CreateArticle};
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
*/

Route::get('locale/{locale}', function ($locale) {
    if (array_key_exists($locale, config('locales'))) {
        session()->put('locale', $locale);
    }
    return redirect()->back();
})->name('locale');

Route::get('/', Index::class)->name('index');
Route::get('articles', Articles::class)->name('articles');
Route::get('article/{slug}', Article::class)->name('article');
Route::get('articles-tagged/{slug}', ArticlesByTag::class)->name('articles.tagged');
Route::get('categories', Categories::class)->name('categories');
Route::get('articles-category/{slug}', ArticlesByCategory::class)->name('articles.category');
Route::get('contact-us', ContactUs::class)->name('contact');
Route::get('about-us', AboutUs::class)->name('about');
Route::get('privacy-policy', PrivacyPolicy::class)->name('privacy.policy');

#.....{ Dashboard Page }.....#
Route::prefix('dashboard')
    ->as('dashboard.')
    ->middleware(['auth', 'verified'])
    ->group(function () {
        Route::get('profile', Profile::class)->name('profile');
        Route::get('analysis', Analysis::class)->name('analysis');
        Route::get('articles', UserArticles::class)->name('articles');
        Route::get('create-article', CreateArticle::class)->name('create.article');
    });

require __DIR__ . '/auth.php';

Route::prefix('admin')
    ->as('admin.')
    ->group(function () {
        require __DIR__ . '/auth.php';
    });
