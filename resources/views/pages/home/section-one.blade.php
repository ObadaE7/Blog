<section id="explore" class="section__one">
    <div class="section__one-right">
        <div class="row__top">
            <div class="section__title">
                <span>{{ $category->name }}</span>
                <a href="{{ route('articles.category', $category->slug) }}">
                    @lang('index.sections.View all')
                </a>
            </div>

            <div class="row__top-container position-relative">
                @forelse ($category->articles->take(5) as $article)
                    @if ($loop->first)
                        <div class="row__top-right">
                            <div class="overlay"></div>
                            <img src="{{ asset('storage/' . $article->imageable->url) }}" class="position-absolute"
                                alt="{{ $article->slug }}">
                            <div class="text-overlay">
                                @foreach ($article->tags->take(1) as $tag)
                                    <a href="{{ route('articles.tagged', $tag->slug) }}"
                                        class="badge__tag bg-dark-subtle text-dark">
                                        {{ $tag->name }}
                                    </a>
                                @endforeach
                                <a href="{{ route('article', $article->slug) }}" class="link">
                                    <span class="text-overlay-title underline">{{ $article->title }}</span>
                                </a>
                                <div class="text-overlay-subtitle">
                                    <span class="material-symbols-outlined fs-5">person_edit</span>
                                    <small>{{ $article->ownerFullName() }}</small>
                                </div>
                            </div>
                        </div>

                        <div class="row__top-left">
                        @else
                            <div class="row__top-left--row">
                                <img src="{{ asset('storage/' . $article->imageable->url) }}" class="w-25"
                                    alt="{{ $article->slug }}">
                                <div class="row__top-left--row-title">
                                    <div class="d-flex flex-column gap-2">
                                        <a href="{{ route('article', $article->slug) }}" class="link">
                                            <span class="underline">{{ $article->title }}</span>
                                        </a>
                                        <small class="text-muted">{{ $article->getDateForHumans() }}</small>
                                    </div>
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
    </div>

    <div class="row__bottom">
        <div class="section__title">
            <span>@lang('index.sections.Various articles')</span>
            <a href="{{ route('articles') }}">@lang('index.sections.View all')</a>
        </div>

        <div class="row__bottom-container position-relative">
            @forelse ($randomArticles as $randomArticle)
                <div class="row__bottom--row">
                    <div class="position-relative">
                        <div class="overlay rounded"></div>
                        @isset($randomArticle->imageable->url)
                            <img src="{{ asset('storage/' . $randomArticle->imageable->url) }}" alt="">
                        @endisset
                        <div class="text__img">
                            <a href="{{ route('article', $randomArticle->slug) }}" class="menu-link">
                                @lang('index.sections.View')
                            </a>
                        </div>
                    </div>
                    <a href="{{ route('article', $randomArticle->slug) }}" class="link">
                        <span class="underline">{{ Str::limit($randomArticle->title, 45, ' ...') }}</span>
                    </a>
                    <small class="text-muted">{{ $randomArticle->getDateForHumans() }}</small>
                </div>
            @empty
                <div class="empty__msg">
                    <span class="text-muted fs-5">@lang('index.sections.Empty msg')</span>
                    <span class="text-muted fs-5">@lang('index.sections.Empty msg hint')</span>
                </div>
            @endforelse
        </div>
    </div>
    </div>

    <div class="section__one-left">
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
                                <span class="text-overlay-title underline">{{ $topArticle->title }}</span>
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
                            <div class="d-flex flex-column gap-2">
                                <a href="{{ route('article', $topArticle->slug) }}" class="link">
                                    <span class="underline">{{ $topArticle->title }}</span>
                                </a>
                                <small class="text-muted">{{ $topArticle->created_at->diffForHumans() }}</small>
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
    </div>
</section>
