<section class="comment__wrapper">
    @auth
        <form>
            <div class="d-flex flex-column gap-2">
                <textarea wire:model="comment" class="form-control" rows="5" placeholder="@lang('index.sections.Write comment')" required></textarea>
                <div class="d-flex align-items-center gap-2">
                    <button wire:click.prevent='create' type="button" class="btn btn-primary px-5">
                        @lang('index.sections.Post comment')
                    </button>
                    <x-error name="comment" />
                </div>
            </div>
        </form>
    @else
        <div class="d-flex flex-column gap-2">
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
            <div class="d-flex flex-column align-items-center bg-light rounded p-3 mt-3">
                <span class="material-symbols-outlined fs-4">upcoming</span>
                @lang('index.sections.Empty comments')
            </div>
        @endforelse
    </div>
</section>
