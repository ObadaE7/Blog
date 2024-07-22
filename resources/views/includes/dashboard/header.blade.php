<header class="wrapper__header">
    <div class="header__brand">
        <img src="{{ asset('assets/img/logo/jeveline-logo-dark-v1.png') }}" alt="Logo">
    </div>
    <div class="header__menu">
        <ul>
            <li>
                @livewire('user.header-notification')
            </li>

            <li>
                <div class="dropdown">
                    <button class="header__btn" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <div class="notify__container">
                            <span class="material-symbols-outlined">mail</span>
                            <span class="notify__count msg">0</span>
                        </div>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><span class="dropdown-item text-center">تحت التطوير</span></li>
                    </ul>
                </div>
            </li>

            <li>
                <div class="dropdown">
                    <button class="header__btn" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        @php
                            $avatarImage = auth()->user()->imageable()->where('type', 'avatar')->first();
                        @endphp
                        <img src="{{ $avatarImage ? asset('storage/' . $avatarImage->url) : asset('assets/img/others/avatar.jpg') }}"
                            class="avatar" alt="@lang('dashboard.profile.Profile avatar')">
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item" href="#">Action</a></li>
                    </ul>
                </div>
            </li>
        </ul>
    </div>
</header>
