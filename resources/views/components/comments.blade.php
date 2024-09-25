<section class="comment__wrapper">
    @auth
        <form>
            <div class="gap-2 d-flex flex-column">
                <textarea wire:model="comment" class="form-control" rows="5" placeholder="@lang('index.sections.Write comment')" required></textarea>
                <div class="gap-2 d-flex align-items-center">
                    <button wire:click.prevent='create' type="button" class="px-5 btn btn-primary">
                        @lang('index.sections.Post comment')
                    </button>
                    <x-error name="comment" />
                </div>
            </div>
        </form>
    @else
        <div class="gap-2 d-flex flex-column">
            <textarea class="form-control" rows="5" placeholder="@lang('index.sections.Write comment')" disabled></textarea>
            <div>
                <a href="{{ route('login') }}" class="btn btn-primary">@lang('index.sections.Login first')</a>
            </div>
        </div>
    @endauth

    <div>
        @forelse ($comments as $comment)
            @include('components.comment-item', ['comment' => $comment])
        @empty
            <div class="p-3 mt-3 rounded d-flex flex-column align-items-center bg-light">
                <span class="material-symbols-outlined fs-4">upcoming</span>
                @lang('index.sections.Empty comments')
            </div>
        @endforelse
    </div>
</section>
