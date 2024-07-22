<section class="wrapper">
    @livewire('home.header')

    <main class="pages__wrapper-articles">
        <div class="pages__wrapper-header">
            <div class="d-flex align-items-center gap-2">
                <span class="material-symbols-outlined">category</span>
                <span class="fs-4">
                    {!! trans('index.pages.Category type', ['category' => $data['category']->name]) !!}
                </span>
            </div>
            <span class="text-muted">
                @lang('index.pages.Category placeholder type', ['category' => $data['category']->name])
            </span>
        </div>

        <div class="pages__wrapper-main art-by-cat position-relative">
            @forelse ($data['articles'] as $article)
                <div class="art-col d-flex flex-column">
                    <div class="art-by-cat-img">
                        <img src="{{ asset('storage/' . $article->imageable->url) }}" alt="{{ $article->slug }}">
                    </div>

                    <div class="d-flex flex-column gap-4 mt-2 flex-grow-1">
                        <div class="d-flex flex-column gap-2">
                            <div class="d-flex justify-content-between align-items-start">
                                <div class="d-flex align-items-center gap-2 text-muted">
                                    <span class="material-symbols-outlined">calendar_month</span>
                                    <span>{{ $article->created_at->diffForHumans() }}</span>
                                </div>

                                <div class="d-flex align-items-center gap-2">
                                    <span class="material-symbols-outlined text-danger">favorite</span>
                                    <span class="text-muted">{{ $article->likes_count }}</span>
                                </div>
                            </div>

                            <div class="d-flex flex-column">
                                <span class="fs-5">{{ $article->title }}</span>
                                <small class="text-muted">{{ $article->subtitle }}</small>
                            </div>
                        </div>

                        <div class="d-flex justify-content-end align-items-center mt-auto">
                            <a href="{{ route('article', $article->slug) }}" class="btn btn-outline-danger px-5">
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

        @if ($data['articles']->total() > 4)
            <div class="pages__wrapper-footer">{{ $data['articles']->links() }}</div>
        @endif
    </main>

    @livewire('home.footer')
</section>
