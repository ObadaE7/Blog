<section class="wrapper">
    @livewire('home.header')

    <main class="pages__wrapper-articles">
        <div class="pages__wrapper-header">
            <div class="d-flex align-items-center gap-2">
                <span class="material-symbols-outlined">feed</span>
                <span class="fs-4">@lang('index.pages.Articles')</span>
            </div>
            <span class="text-muted">@lang('index.pages.Articles placeholder')</span>
        </div>

        <div class="pages__wrapper-main">
            <div class="pages__articles-right">
                <div class="pages__articles-search">
                    <div class="section__title">
                        <span>@lang('index.pages.Search article')</span>
                    </div>
                    <input wire:model.live='search' type="search" class="form-control" placeholder="@lang('index.pages.Search article placeholder')">
                </div>

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

                <div class="pages__articles-ads">
                    {{-- <img src="{{ asset('assets/img/others/microfunnel-flaticon.png') }}" alt=""> --}}
                </div>
            </div>

            <div class="pages__articles-left position-relative">
                @forelse ($articles as $article)
                    <div class="pages__articles-content">
                        <div class="pages__articles-img">
                            <img src="{{ asset('storage/' . $article->imageable->url) }}" class="card-img"
                                alt="{{ $article->slug }}">
                        </div>

                        <div class="pages__articles-info">
                            <div class="d-flex flex-column">
                                <span class="fs-5">{{ $article->title }}</span>
                                <small class="text-muted">{{ $article->subtitle }}</small>
                            </div>

                            <div class="d-flex align-items-center gap-3 mt-auto">
                                @if ($article->owner()->imageable)
                                    <img src="{{ asset('storage/' . $article->ownerAvatar()) }}" class="avatar"
                                        alt="{{ $article->slug }}">
                                @else
                                    <div class="avatar__subtle">
                                        <span>{{ $article->ownerAvatarSubtle() }}</span>
                                    </div>
                                @endif
                                <span>{{ $article->ownerFullName() }}</span>
                            </div>

                            <div class="d-flex mt-auto">
                                <a href="{{ route('article', $article->slug) }}" class="btn-orange">
                                    @lang('index.pages.Read more')
                                </a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="empty__msg">
                        <span class="text-muted fs-5">@lang('index.sections.Empty msg')</span>
                        <span class="text-muted fs-5">@lang('index.sections.Empty msg hint')</span>
                    </div>
                @endforelse
            </div>
        </div>

        @if ($articles->total() > 5)
            <div class="pages__wrapper-footer">{{ $articles->links() }}</div>
        @endif
    </main>

    @livewire('home.footer')
</section>
