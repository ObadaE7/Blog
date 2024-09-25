<section class="section__three">
    <div class="section__three-right">
        <div class="section__title">
            <span>@lang('index.sections.Latest articles')</span>
            <a href="{{ route('articles') }}">@lang('index.sections.View all')</a>
        </div>

        <div class="section__three-right-container">
            <div class="section__three-right-container position-relative">
                @forelse ($latestArticles as $latestArticle)
                    <div class="section__three-right-content">
                        <div class="article__img">
                            <img src="{{ asset('storage/' . $latestArticle->imageable->url) }}"
                                alt="{{ $latestArticle->slug }}">
                        </div>
                        <div class="gap-2 d-flex flex-column">
                            @forelse ($latestArticle->tags->take(1) as $tag)
                                <a href="{{ route('articles.tagged', $tag->slug) }}"
                                    class="badge__tag bg-danger-subtle text-danger">
                                    {{ $tag->name }}
                                </a>
                            @empty
                                <span class="badge__tag bg-danger-subtle text-danger">NULL</span>
                            @endforelse
                            <span class="fw-bold">{{ $latestArticle->title }}</span>
                            <div class="gap-2 d-flex align-items-center">
                                @if ($latestArticle->ownerAvatar())
                                    <img src="{{ asset('storage/' . $latestArticle->ownerAvatar()) }}" class="avatar"
                                        alt="Avatar">
                                @else
                                    <div class="avatar__subtle bg-primary-subtle text-primary">
                                        {{ $latestArticle->ownerAvatarSubtle() }}
                                    </div>
                                @endif
                                <span class="text-muted">{{ $latestArticle->ownerFullName() }}</span>
                            </div>
                            <small class="text-muted truncate-three-line">{{ $latestArticle->content }}</small>
                            <div class="mt-auto text-center">
                                <a href="{{ route('article', $latestArticle->slug) }}"
                                    class="px-5 btn btn-outline-primary rounded-pill">
                                    @lang('index.sections.Read more')
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

                @if ($latestArticles->total() > 0 && $latestArticles->count() < $latestArticles->total())
                    <div class="pt-3 d-flex justify-content-center border-top">
                        <button wire:click.prevent='loadMore' class="btn btn-primary w-50">عرض المزيد</button>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <div class="section__three-left">
        <div class="section__three-category">
            <div class="section__title">
                <span>@lang('index.sections.Categories')</span>
            </div>
            <div class="section__three-category-content">
                <div class="search__input">
                    <input wire:model.live='search' type="search" class="form-control" placeholder="@lang('index.sections.Search placeholder')">
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
</section>
