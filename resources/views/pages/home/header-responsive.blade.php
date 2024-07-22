<div class="offcanvas offcanvas-{{ app()->isLocale('ar') ? 'end' : 'start' }}" tabindex="-1" id="headerToggle"
    aria-labelledby="headerToggleLabel">
    <div class="offcanvas-header justify-content-between">
        <h5 class="offcanvas-title" id="headerToggleLabel">إغلاق</h5>
        <button type="button" class="btn-close m-0" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <div class="header__menu-aside">
            <ul>
                <li>
                    <a href="{{ route('index') }}" class="{{ Route::is('index') ? 'active' : '' }}">
                        <div class="d-flex align-items-center gap-2">
                            <span class="material-symbols-outlined">home</span>@lang('index.header.Homepage')
                        </div>
                    </a>
                </li>
                <li>
                    <a href="{{ route('categories') }}" class="{{ Route::is('categories') ? 'active' : '' }}">
                        <div class="d-flex align-items-center gap-2">
                            <span class="material-symbols-outlined">category</span>@lang('index.header.Categories')
                        </div>
                    </a>
                </li>
                <li>
                    <a href="{{ route('articles') }}" class="{{ Route::is('articles') ? 'active' : '' }}">
                        <div class="d-flex align-items-center gap-2">
                            <span class="material-symbols-outlined">article</span>@lang('index.header.Articles')
                        </div>
                    </a>
                </li>
                @auth
                    <li>
                        <a href="{{ route('dashboard.profile') }}"
                            class="{{ Route::is('dashboard.profile') ? 'active' : '' }}">
                            <div class="d-flex align-items-center gap-2">
                                <span class="material-symbols-outlined">account_circle</span>@lang('index.header.Profile')
                            </div>
                        </a>
                    </li>
                @else
                    <li>
                        <a href="{{ route('login') }}" class="{{ Route::is('login') ? 'active' : '' }}">
                            <div class="d-flex align-items-center gap-2">
                                <span class="material-symbols-outlined">login</span>@lang('index.header.Login')
                            </div>
                        </a>
                    </li>
                @endauth
                <li>

                    @foreach (config('locales') as $localeCode => $properties)
                        @if (app()->getLocale() == $localeCode)
                            @foreach (config('locales') as $otherLocaleCode => $otherProperties)
                                @if ($otherLocaleCode !== $localeCode)
                                    <a href="{{ route('locale', $otherLocaleCode) }}" class="text-dark">
                                        <div class="d-flex align-items-center gap-2">
                                            <span
                                                class="material-symbols-outlined">globe</span>{{ $properties['name'] }}
                                        </div>
                                    </a>
                                @endif
                            @endforeach
                        @endif
                    @endforeach
                </li>
                <li>
                    <a href="javascript:void(0)">
                        <div class="d-flex align-items-center gap-2">
                            <span class="material-symbols-outlined">light_mode</span>فاتح
                        </div>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
