<section class="section__two">
    @forelse ($categories as $category)
        @if ($loop->first)
            <div class="section__two-right">
                @foreach ($categories->take(2) as $firstCategory)
                    <div class="section__two-right-col">
                        <div class="section__title">
                            <span>{{ $firstCategory->name }}</span>
                            <a href="{{ route('articles.category', $firstCategory->slug) }}">@lang('index.sections.View all')</a>
                        </div>

                        <div class="section__one-trending-top">
                            <img src="{{ asset('storage/' . $firstCategory->imageable->url) }}"
                                alt="{{ $firstCategory->slug }}">
                        </div>

                        <div class="section__one-trending-bottom position-relative">
                            @forelse ($firstCategory->articles->take(3) as $article)
                                <div class="trending__bottom-row">
                                    <img src="{{ asset('storage/' . $article->imageable->url) }}" class="w-25"
                                        alt="{{ $article->slug }}">
                                    <div class="d-flex flex-column gap-2">
                                        <a href="{{ route('article', $article->slug) }}" class="link">
                                            <span class="underline">{{ $article->title }}</span>
                                        </a>
                                        <small class="text-muted">{{ $article->created_at->diffForHumans() }}</small>
                                    </div>
                                </div>
                            @empty
                                <div class="empty__msg text-center w-100">
                                    <span class="text-muted fs-5">@lang('index.sections.Empty msg')</span>
                                    <span class="text-muted fs-5">@lang('index.sections.Empty msg hint')</span>
                                </div>
                            @endforelse
                        </div>
                    </div>
                @endforeach
            </div>
        @endif

        @if ($loop->last)
            <div class="section__two-left">
                <div class="section__title">
                    <span>{{ $category->name }}</span>
                    <a href="{{ route('articles.category', $category->slug) }}">@lang('index.sections.View all')</a>
                </div>

                <div class="section__two-left-container position-relative">
                    @forelse ($category->articles->take(4) as $article)
                        <div class="section__two-left-row">
                            <img src="{{ asset('storage/' . $article->imageable->url) }}" alt="{{ $article->slug }}">
                            <a href="{{ route('article', $article->title) }}" class="link">
                                <span class="underline">{{ $article->title }}</span>
                            </a>
                            <small class="text-muted">{{ $article->created_at->diffForHumans() }}</small>
                        </div>
                    @empty
                        <div class="empty__msg text-center w-100">
                            <span class="text-muted fs-5">@lang('index.sections.Empty msg')</span>
                            <span class="text-muted fs-5">@lang('index.sections.Empty msg hint')</span>
                        </div>
                    @endforelse
                </div>
            </div>
        @endif
    @empty
        <p>@lang('index.sections.No categories found')</p>
    @endforelse
</section>
