<section class="wrapper">
    @livewire('home.header')

    <section class="pages__wrapper">
        <div class="row__top">
            <div class="pages__wrapper-right">
                <div class="pages__wrapper-row">
                    <div class="pages__breadcrumb">
                        <x-breadcrumb>
                            <li class="breadcrumb-item">
                                <a href="{{ route('index') }}">@lang('index.header.Homepage')</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">@lang('index.sections.Article')</li>
                        </x-breadcrumb>
                    </div>

                    <div class="pages__right-content">
                        <div class="content__header">
                            <div class="d-flex flex-column">
                                <span class="article__title">{{ $article->title }}</span>
                                <span class="article__subtitle">{{ $article->subtitle }}</span>
                            </div>

                            <div class="d-flex flex-sm-row flex-column justify-content-between">
                                <div class="gap-2 d-flex align-items-center">
                                    @if ($article->owner()->imageable)
                                        <img src="{{ asset('storage/' . $article->owner()->imageable->url) }}"
                                            class="avatar" alt="{{ $article->owner()->uname }}">
                                    @else
                                        <div class="avatar__subtle">
                                            <span>{{ $article->ownerAvatarSubtle() }}</span>
                                        </div>
                                    @endif
                                    <span>{{ $article->ownerFullName() }}</span>
                                    <span class="text-muted">{{ '- ' . $article->getDateForHumans() }}</span>
                                </div>

                                <div class="gap-4 d-flex justify-content-center">
                                    @php
                                        $user = Auth::user();
                                        $isLiked = $user ? $article->isLikedByUser($user->id) : false;
                                        $isDisliked = $user ? $article->isDislikedByUser($user->id) : false;
                                    @endphp

                                    <div class="gap-2 d-flex align-items-center">
                                        <button wire:click.prevent='like({{ $article->id }})'
                                            class="btn__transparent btn__like {{ $isLiked ? 'active' : '' }}"></button>
                                        <span class="text-muted">{{ $article->likes_count }}</span>
                                    </div>

                                    <div class="gap-2 d-flex align-items-center">
                                        <button wire:click.prevent='dislike({{ $article->id }})'
                                            class="btn__transparent btn__dislike {{ $isDisliked ? 'active' : '' }}"></button>
                                        <span class="text-muted">{{ $article->dislikes_count }}</span>
                                    </div>
                                    <div class="gap-2 d-flex align-items-center">
                                        <a href="#comment-form" class="cursor-pointer d-flex">
                                            <span class="material-symbols-outlined orange-forum fs-5">forum</span>
                                        </a>
                                        <span class="text-muted">{{ $commentCount }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="content__body">
                            <div class="content__body-img">
                                <img src="{{ asset('storage/' . $article->imageable->url) }}"
                                    alt="{{ $article->slug }}">
                                @foreach ($article->categories as $category)
                                    <a href="{{ route('articles.category', $category->slug) }}" class="badge-category">
                                        {{ $category->name }}
                                    </a>
                                @endforeach
                            </div>

                            <div class="content__body-text">
                                {!! Str::Markdown($article->content) !!}
                            </div>

                            <div class="content__body-tags">
                                @foreach ($article->tags as $tag)
                                    <a href="{{ route('articles.tagged', $tag->slug) }}"
                                        class="tags-badge bg-danger-subtle text-danger">
                                        {{ $tag->name }}
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

                <div class="pages__author">
                    <div class="pages__author-img">
                        @if ($article->owner()->imageable)
                            <img src="{{ asset('storage/' . $article->owner()->imageable->url) }}" class="avatar"
                                alt="{{ $article->owner()->uname }}">
                        @else
                            <div class="avatar__subtle">
                                <span>{{ $article->ownerAvatarSubtle() }}</span>
                            </div>
                        @endif
                    </div>

                    <div class="pages__author-info">
                        <span class="author__name">{{ $article->ownerFullName() }}</span>
                        <span class="author__bio">{{ $article->owner()->bio }}</span>
                    </div>
                </div>
            </div>

            <div class="pages__wrapper-left">
                <div class="section__one-left-follow">
                    <div class="section__title">
                        <span>@lang('index.sections.Follow us')</span>
                    </div>

                    <div class="follow__container">
                        <div class="follow__row">
                            <a href="{{ $settings->facebook ?? '#' }}" target="_blank">
                                <div class="social-badge facebook-badge">
                                    <i class="fi fi-brands-facebook"></i>
                                    <span>@lang('index.sections.Facebook')</span>
                                </div>
                            </a>
                        </div>
                        <div class="follow__row">
                            <a href="{{ $settings->twitter ?? '#' }}">
                                <div class="social-badge twitter-badge">
                                    <i class="fi fi-brands-twitter-alt"></i>
                                    <span>@lang('index.sections.Twitter')</span>
                                </div>
                            </a>
                        </div>
                        <div class="follow__row">
                            <a href="{{ $settings->youtube ?? '#' }}" target="_blank">
                                <div class="social-badge youtube-badge">
                                    <i class="fi fi-brands-youtube"></i>
                                    <span>@lang('index.sections.Youtube')</span>
                                </div>
                            </a>
                        </div>
                        <div class="follow__row">
                            <a href="{{ $settings->instagram ?? '#' }}" target="_blank">
                                <div class="social-badge instagram-badge">
                                    <i class="fi fi-brands-instagram"></i>
                                    <span>@lang('index.sections.Instagram')</span>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="section__one-left-trending position-relative">
                    <div class="section__title">
                        <span>@lang('index.sections.Popular articles')</span>
                    </div>

                    @forelse ($topArticles as  $topArticle)
                        @if ($loop->first)
                            <div class="section__one-trending-top">
                                <div class="overlay"></div>
                                <img src="{{ asset('storage/' . $topArticle->imageable->url) }}"
                                    alt="{{ $topArticle->slug }}">
                                <div class="text-overlay">
                                    <a href="{{ route('article', $topArticle->slug) }}" class="link">
                                        <span class="underline text-overlay-title">{{ $topArticle->title }}</span>
                                    </a>
                                    <div class="text-overlay-subtitle">
                                        <span class="material-symbols-outlined fs-5">person_edit</span>
                                        <small>{{ $topArticle->ownerFullName() }}</small>
                                    </div>
                                </div>
                            </div>
                            <div class="section__one-trending-bottom">
                            @else
                                <div class="trending__bottom-row">
                                    <img src="{{ asset('storage/' . $topArticle->imageable->url) }}" class="w-25"
                                        alt="{{ $topArticle->slug }}">
                                    <div class="gap-2 d-flex flex-column">
                                        <a href="{{ route('article', $topArticle->slug) }}" class="link">
                                            <span class="underline">{{ $topArticle->title }}</span>
                                        </a>
                                        <small
                                            class="text-muted">{{ $topArticle->created_at->diffForHumans() }}</small>
                                    </div>
                                </div>
                        @endif
                        @if ($loop->last)
                </div>
                @endif
            @empty
                <div class="empty__msg">
                    <span class="text-muted fs-5">@lang('index.sections.Empty msg')</span>
                    <span class="text-muted fs-5">@lang('index.sections.Empty msg hint')</span>
                </div>
                @endforelse
            </div>

            @livewire('home.subscribe')

            <div class="section__three-category">
                <div class="section__title">
                    <span>@lang('index.sections.Categories')</span>
                </div>
                <div class="section__three-category-content">
                    <div class="search__input">
                        <input wire:model.live='search' type="search" class="form-control"
                            placeholder="@lang('index.sections.Search placeholder')">
                    </div>
                    @forelse ($categories as  $category)
                        <a href="{{ route('articles.category', $category->slug) }}">
                            <div class="category-badge">
                                <span>{{ $category->name }}</span>
                                <span>({{ $category->articles->count() }})</span>
                            </div>
                        </a>
                    @empty
                        <div class="category-badge text-bg-danger">
                            <span>@lang('index.sections.Empty category')</span>
                        </div>
                    @endforelse
                    <a href="{{ route('categories') }}">
                        <div class="category-badge ">
                            <span>@lang('index.sections.View all')</span>
                            <span>({{ $categoriesCount }})</span>
                        </div>
                    </a>
                </div>
            </div>

            <div class="section__three-tags">
                <div class="section__title">
                    <span>@lang('index.sections.Tags')</span>
                </div>
                <div class="section__three-tags-content">
                    @foreach ($topTags as $tag)
                        <a href="{{ route('articles.tagged', $tag->slug) }}" class="tags-badge">
                            {{ $tag->name }}
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
        </div>

        <div class="row__bottom">
            <div class="pages__related-articles">
                <div class="section__title">
                    <span>@lang('index.sections.Related article')</span>
                </div>

                <div class="related__article-content position-relative">
                    @forelse ($relatedArticles as  $relatedArticle)
                        <div class="related__article-col">
                            <img src="{{ asset('storage/' . $relatedArticle->imageable->url) }}"
                                alt="{{ $relatedArticle->slug }}">
                            <a href="{{ route('article', $relatedArticle->slug) }}" class="link">
                                <span class="underline">{{ Str::limit($relatedArticle->title, 45, ' ...') }}</span>
                            </a>
                            <small class="text-muted">{{ $relatedArticle->getDateForHumans() }}</small>
                        </div>
                    @empty
                        <div class="empty__msg">
                            <span class="text-muted fs-5">@lang('index.sections.Empty msg')</span>
                            <span class="text-muted fs-5">@lang('index.sections.Empty msg hint')</span>
                        </div>
                    @endforelse
                </div>
            </div>

            <div id="comment-form" class="pages__comments">
                <div class="section__title">
                    <span>@lang('index.sections.Send comment')</span>
                </div>
                @livewire('home.comments', ['article' => $article])
            </div>
        </div>
    </section>

    @livewire('home.footer')
</section>
