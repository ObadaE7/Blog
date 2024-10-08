@section('breadcrumb')
<x-breadcrumb>
    <li class="breadcrumb-item">
        <a href="{{ route('dashboard.articles') }}">
            {{ trans('dashboard.navigation.Articles') }}
        </a>
    </li>
    <li class="breadcrumb-item active" aria-current="page">
        <a>{{ trans('dashboard.navigation.Show') }}</a>
    </li>
</x-breadcrumb>
@endsection

<section class="articles__wrapper">
    <div class="articles__filters">
        <div class="filter__search">
            <button class="btn__search" type="button" data-bs-toggle="dropdown" aria-expanded="false"></button>
            <input wire:model.live='search' type="search" class="form-control input__search"
                placeholder="@lang('dashboard.post.Search here')">
            <ul class="dropdown-menu dropdown-menu-start text-end">
                <li>
                    <div class="dropdown-item">
                        <span class="text-muted">@lang('dashboard.post.Search by')</span>
                    </div>
                </li>
                @foreach ($columns as $column)
                <li>
                    <button wire:click="$set('searchBy', '{{ $column }}')"
                        class="dropdown-item {{ $searchBy == $column ? 'active' : '' }}">
                        @lang('dashboard.post.' . ucfirst($column))
                    </button>
                </li>
                @endforeach
            </ul>
        </div>

        <div class="filter__per-page">
            <select wire:model.live='perPage' class="form-select">
                <option disabled>@lang('dashboard.post.Per page')</option>
                @foreach ($perPages as $item)
                <option value="{{ $item }}">{{ $item }}</option>
                @endforeach
            </select>
        </div>

        <div class="filter__order-by">
            <button wire:click="$set('orderDir','desc')"
                class="btn {{ $orderDir == 'desc' ? 'btn-primary' : '' }} fw-bold">
                <div class="d-flex align-items-center gap-2">
                    <span class="material-symbols-outlined">sort</span>
                    <span>@lang('dashboard.post.Newest')</span>
                </div>
            </button>

            <button wire:click="$set('orderDir','asc')"
                class="btn {{ $orderDir == 'asc' ? 'btn-primary' : '' }} fw-bold">
                <div class="d-flex align-items-center gap-2">
                    <div class="d-flex align-items-center gap-2">
                        <span class="material-symbols-outlined">sort</span>
                        <span>@lang('dashboard.post.Oldest')</span>
                    </div>
                </div>
            </button>
        </div>
    </div>

    <div class="articles__content">
        @forelse ($articles as $article)
        <div class="articles__row-post">
            <div class="articles__img">
                <img src="{{ asset('storage/' . $article->imageable->url) }}" alt="{{ $article->slug }}">
            </div>

            <div class="articles__info">
                <div class="d-flex flex-column">
                    <a href="{{route('article', $article->slug)}}">{{ $article->title }}</a>
                    <small class="text-muted ">{{ $article->subtitle }}</small>
                </div>
                <small class="articles__info-content">{{ $article->content }}</small>
            </div>

            <div class="articles__settings">
                <div class="d-flex justify-content-between">
                    <small class="text-muted">@lang('dashboard.post.Quick peek')</small>
                    <button type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <span class="material-symbols-outlined">settings</span>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end text-end">
                        <li><a class="dropdown-item" href="#">@lang('dashboard.post.Edit')</a></li>
                        <li><a class="dropdown-item" href="#">@lang('dashboard.post.Delete')</a></li>
                    </ul>
                </div>

                <div class="d-flex flex-column gap-3">
                    @php
                    $totalReactions = $article->likes_count + $article->dislikes_count;
                    $likes_percentage =
                    $article->likes_count > 0 ? ($article->likes_count / $totalReactions) * 100 : 0;
                    $dislikes_percentage =
                    $article->dislikes_count > 0 ? ($article->dislikes_count / $totalReactions) * 100 : 0;
                    @endphp

                    <div class="d-flex justify-content-between">
                        <div class="d-flex align-items-center gap-3">
                            <span class="material-symbols-outlined text-primary">thumb_up</span>
                            <span>{{ $article->likes_count }}</span>
                        </div>
                        <div class="d-flex align-items-center gap-1 text-success">
                            <span class="material-symbols-outlined">donut_small</span>
                            <span>{{ round($likes_percentage, 2) }}%</span>
                        </div>
                    </div>

                    <div class="d-flex justify-content-between">
                        <div class="d-flex align-items-center gap-3">
                            <span class="material-symbols-outlined text-danger">thumb_down</span>
                            <span>{{ $article->dislikes_count }}</span>
                        </div>
                        <div class="d-flex align-items-center gap-1 text-danger">
                            <span class="material-symbols-outlined">donut_small</span>
                            <span>{{ round($dislikes_percentage, 2) }}%</span>
                        </div>
                    </div>
                </div>

                <div class="d-flex flex-column text-muted">
                    {{-- <span>@lang('dashboard.post.Created at') {{ $article->getDateForHuman() }}</span> --}}
                    <small>{{ $article->created_at->diffForHumans() }}</small>
                </div>
            </div>
        </div>
        @empty
        <div class="articles__row-post">
            <div class="d-flex flex-column align-items-center">
                <span class="text-nowrap">@lang('index.sections.Empty line one')</span>
                <span class="">@lang('index.sections.Empty line two')</span>
            </div>
        </div>
        @endforelse

        @if ($articles->count() > 5)
        <div class="paginate__section">{{ $articles->links() }}</div>
        @endif
    </div>
</section>