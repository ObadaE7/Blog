<div class="d-flex gap-3 mt-4 comment-container flex-column-md">
    @if ($comment->ownerAvatar())
        <img src="{{ asset('storage/' . $comment->ownerAvatar()) }}" class="avatar" alt="{{ $comment->owner()->uname }}">
    @else
        <div class="avatar__subtle"><span>{{ $comment->ownerAvatarSubtle() }}</span></div>
    @endif

    <div class="d-flex flex-column comment-content">
        <div class="bg-light rounded p-3">
            <div class="d-flex justify-content-between mb-3">
                <div class="d-flex flex-column">
                    <span>{{ $comment->ownerFullName() }}</span>
                    <div class="d-flex align-items-center gap-2">
                        <span class="material-symbols-outlined fs-6 text-danger">favorite</span>
                        <span class="text-muted">{{ $comment->likes->count() }}</span>
                    </div>
                </div>
                <div class="align-self-start">
                    <small>{{ $comment->created_at->diffForHumans() }}</small>
                </div>
            </div>

            @if ($comment->parent_id)
                @php
                    $parentComment = App\Models\Comment::find($comment->parent_id);
                    $parentUser = $parentComment ? $parentComment->user : null;
                @endphp
                @if ($parentUser)
                    <span class="badge bg-primary-subtle text-primary">
                        @lang('index.sections.Reply to') {{ $parentUser->fname . ' ' . $parentUser->lname }}
                    </span>
                @endif
            @endif
            <span class="fw-medium">{{ $comment->comment }}</span>
        </div>

        <div class="d-flex gap-4 mt-2">
            <div>
                @php
                    $isLiked = $comment->likes->where('user_id', auth()->id())->isNotEmpty();
                @endphp
                @auth
                    <button wire:click="likeComment({{ $comment->id }})" class="btn {{ $isLiked ? 'text-primary' : '' }}">
                        @if ($isLiked)
                            @lang('index.sections.Liked')
                        @else
                            @lang('index.sections.Like')
                        @endif
                    </button>
                @else
                    <button type="button" class="btn" data-bs-toggle="tooltip" data-bs-custom-class="primary-tooltip"
                        data-bs-title="@lang('index.sections.Login first')">
                        @lang('index.sections.Like')
                    </button>
                @endauth
            </div>
            <button wire:click="setParent({{ $comment->id }})" class="btn">@lang('index.sections.Reply')</button>
            @if (auth()->id() == $comment->user_id)
                <button wire:click="delete({{ $comment->id }})" class="btn">@lang('index.sections.Remove')</button>
            @endif
        </div>

        @if ($parent_id === $comment->id)
            <div class="mt-4">
                @auth
                    <div class="comment__wrapper">
                        <form>
                            <div class="d-flex flex-column gap-2">
                                <textarea wire:model="comment" class="form-control" placeholder="@lang('index.sections.Write reply')" required></textarea>
                                <div class="d-flex align-items-center gap-2">
                                    <button wire:click.prevent='create' type="button" class="btn btn-primary px-5">
                                        @lang('index.sections.Post reply')
                                    </button>
                                    <button wire:click.prevent="cancelReply" class="btn" type="button">
                                        @lang('index.sections.Cancel')
                                    </button>
                                    <x-error name="comment" />
                                </div>
                            </div>
                        </form>
                    </div>
                @else
                    <div class="d-flex flex-column gap-2">
                        <textarea class="form-control" placeholder="@lang('index.sections.Write reply')" disabled></textarea>
                        <div>
                            <a href="{{ route('login') }}" class="btn btn-primary">@lang('index.sections.Login first')</a>
                        </div>
                    </div>
                @endauth
            </div>
        @endif

        @foreach ($comment->replies as $reply)
            @include('components.comment-item', ['comment' => $reply])
        @endforeach
    </div>
</div>
