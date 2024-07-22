<header class="wrapper__header">
    <div class="wrapper__header-nav">
        <div class="header__nav-menu">
            <ul>
                <li>
                    <a href="{{ route('about') }}">@lang('index.header.About us')</a>
                </li>
                <li>
                    <a href="{{ route('privacy.policy') }}">@lang('index.header.Privacy policy')</a>
                </li>
                <li>
                    <a href="{{ route('contact') }}">@lang('index.header.Contact us')</a>
                </li>
            </ul>
        </div>

        <div class="header__nav-social">
            <ul>
                <li>
                    <a href="{{ $settings->facebook ?? '#' }}" target="_blank">
                        <i class="fi fi-brands-facebook"></i>
                    </a>
                </li>

                <li>
                    <a href="{{ $settings->instagram ?? '#' }}" target="_blank">
                        <i class="fi fi-brands-instagram"></i>
                    </a>
                </li>

                <li>
                    <a href="{{ $settings->youtube ?? '#' }}" target="_blank">
                        <i class="fi fi-brands-youtube"></i>
                    </a>
                </li>
            </ul>
        </div>
    </div>

    <div class="wrapper__header-header">
        <div class="header__brand">
            <img src="{{ asset($settings->logo_dark ? 'storage/' . $settings->logo_dark : 'storage/img/logo/jeveline-logo-dark-v1.png') }}"
                alt="Jeveline Logo">
        </div>

        <div class="header__menu">
            <ul>
                <li>
                    <a href="{{ route('index') }}" class="menu-link {{ Route::is('index') ? 'active' : '' }}">
                        @lang('index.header.Homepage')
                    </a>
                </li>
                <li>
                    <a href="{{ route('categories') }}"
                        class="menu-link {{ Route::is('categories') ? 'active' : '' }}">
                        @lang('index.header.Categories')
                    </a>
                </li>
                <li>
                    <a href="{{ route('articles') }}" class="menu-link {{ Route::is('articles') ? 'active' : '' }}">
                        @lang('index.header.Articles')
                    </a>
                </li>
                @auth
                    <li>
                        <a href="{{ route('dashboard.profile') }}"
                            class="menu-link {{ Route::is('dashboard.profile') ? 'active' : '' }}">
                            @lang('index.header.Profile')
                        </a>
                    </li>
                @else
                    <li>
                        <a href="{{ route('login') }}" class="menu-link {{ Route::is('login') ? 'active' : '' }}">
                            @lang('index.header.Login')
                        </a>
                    </li>
                @endauth
            </ul>
        </div>

        <div class="header__options">
            <div class="options__lang">
                <span class="material-symbols-outlined">globe</span>
                @foreach (config('locales') as $localeCode => $properties)
                    @if (app()->getLocale() == $localeCode)
                        @foreach (config('locales') as $otherLocaleCode => $otherProperties)
                            @if ($otherLocaleCode !== $localeCode)
                                <a href="{{ route('locale', $otherLocaleCode) }}" class="text-dark">
                                    <span>{{ $properties['name'] }}</span>
                                </a>
                            @endif
                        @endforeach
                    @endif
                @endforeach
            </div>

            <div class="options__theme">
                <span class="material-symbols-outlined">light_mode</span>
                <span>@lang('index.header.Light')</span>
            </div>
        </div>

        <div class="header__toggle">
            <button class="btn btn-sm btn-outline-secondary" type="button" data-bs-toggle="offcanvas"
                data-bs-target="#headerToggle" aria-controls="headerToggle">
                <div class="d-flex">
                    <span class="material-symbols-outlined">menu</span>
                </div>
            </button>
        </div>
    </div>
</header>
