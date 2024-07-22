<div class="dropdown">
    <button class="header__btn" type="button" data-bs-toggle="dropdown" aria-expanded="false">
        <div class="notify__container">
            <span class="material-symbols-outlined">notifications</span>
            <span class="notify__count">{{ $unreadCount }}</span>
        </div>
    </button>

    <ul class="dropdown-menu dropdown-menu-end notify__dropdown">
        <li>
            <div class="dropdown-item text-center">
                <div class="d-flex justify-content-between">
                    <button wire:click.prevent='markAllAsRead'
                        class="header__btn text-primary {{ $unreadCount <= 0 ? 'text-muted' : '' }}"
                        {{ $unreadCount <= 0 ? 'disabled' : '' }}>
                        @lang('dashboard.notification.Mark all')
                    </button>
                    <button wire:click.prevent='deleteAll' class="header__btn text-danger"
                        {{ $notifications->count() == 0 ? 'disabled' : '' }}>
                        @lang('dashboard.notification.Delete all')
                    </button>
                </div>
            </div>
        </li>

        <li class="dropdown-divider"></li>

        @forelse ($notifications as $notification)
            <li>
                <div class="dropdown-item">
                    @php $user = App\Models\User::find($notification->user_id); @endphp
                    <div class="notify__dropdown-item">
                        <div class="notify__dropdown-img">
                            @if ($user->imageable)
                                <img src="{{ asset('storage/' . $user->imageable->url) }}" class="avatar"
                                    alt="{{ $user->uname }}">
                            @else
                                <div class="avatar__subtle">
                                    <span>{{ Str::upper(Str::substr($user->fname, 0, 1) . Str::substr($user->lname, 0, 1)) }}</span>
                                </div>
                            @endif
                        </div>

                        <div class="notify__dropdown-info">
                            <span class="fw-medium">{{ $user->fname . ' ' . $user->lname }}</span>
                            <span>{{ $notification->data['message'] }}</span>

                            <div class="d-flex justify-content-between">
                                @isset($notification->data['url'])
                                    <a href="{{ $notification->data['url'] }}"
                                        wire:click='markAsRead({{ $notification->id }})'>
                                        @lang('dashboard.notification.View article')
                                    </a>
                                @endisset
                                <span>{{ $notification->created_at->diffForHumans() }}</span>
                            </div>

                            <div class="d-flex justify-content-end gap-4 mt-3">
                                <button wire:click.prevent='markAsRead({{ $notification->id }})' class="header__btn">
                                    @lang('dashboard.notification.Mark')
                                </button>
                                <button wire:click.prevent='delete({{ $notification->id }})' class="header__btn">
                                    @lang('dashboard.notification.Delete')
                                </button>
                            </div>
                        </div>

                        <div class="notify__dropdown-type">
                            <span
                                class="material-symbols-outlined fs-6 {{ $notification->read_at ?? 'text-primary' }}">
                                {{ $notification->type === 'App\\Notifications\\CommentCreatedNotification'
                                    ? 'forum'
                                    : ($notification->data['reactionType'] === 'like'
                                        ? 'favorite'
                                        : 'heart_broken') }}
                            </span>
                        </div>
                    </div>
                </div>
            </li>

            <li class="dropdown-divider"></li>

        @empty
            <li>
                <div class="dropdown-item text-center">
                    @lang('dashboard.notification.Empty notification')
                </div>
                <div class="dropdown-divider"></div>
            </li>
        @endforelse

        <li>
            <div class="dropdown-item d-flex justify-content-center">
                <button wire:click.prevent="toggleShowAllNotifications" class="header__btn">
                    @lang('dashboard.notification.View all')
                </button>
            </div>
        </li>
    </ul>
</div>
