<aside class="wrapper__aside">
    <ul>
        <li>
            <a href="{{ route('index') }}">
                <div class="li__item">
                    <span class="li__icon index"></span>
                    <span class="li__text">@lang('dashboard.navigation.Home')</span>
                </div>
            </a>
        </li>
        <li>
            <a href="{{ route('admin.profile') }}">
                <div class="li__item {{ Route::is('admin.profile') ? 'active' : '' }}">
                    <span class="li__icon profile"></span>
                    <span class="li__text">@lang('dashboard.navigation.Profile')</span>
                </div>
            </a>
        </li>
        <li>
            <a href="{{ route('admin.settings') }}">
                <div class="li__item {{ Route::is('admin.settings') ? 'active' : '' }}">
                    <span class="li__icon settings"></span>
                    <span class="li__text">@lang('dashboard.navigation.Settings')</span>
                </div>
            </a>
        </li>
        <li>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="header__btn w-100 li__item">
                    <span class="li__icon logout"></span>
                    <span class="li__text">@lang('dashboard.navigation.Logout')</span>
                </button>
            </form>
        </li>
        <li>
            <small class="li__item-split text-muted">@lang('dashboard.navigation.Basic tables')</small>
        </li>
        <li>
            <a href="{{ route('admin.roles') }}">
                <div class="li__item {{ Route::is('admin.roles') ? 'active' : '' }}">
                    <span class="li__icon role"></span>
                    <span class="li__text">@lang('dashboard.navigation.Roles')</span>
                </div>
            </a>
        </li>

        <li>
            <a href="{{ route('admin.countries') }}">
                <div class="li__item {{ Route::is('admin.countries') ? 'active' : '' }}">
                    <span class="li__icon country"></span>
                    <span class="li__text">@lang('dashboard.navigation.Countries')</span>
                </div>
            </a>
        </li>

        <li>
            <a href="{{ route('admin.categories') }}">
                <div class="li__item {{ Route::is('admin.categories') ? 'active' : '' }}">
                    <span class="li__icon category"></span>
                    <span class="li__text">@lang('dashboard.navigation.Categories')</span>
                </div>
            </a>
        </li>

        <li>
            <a href="{{ route('admin.tags') }}">
                <div class="li__item {{ Route::is('admin.tags') ? 'active' : '' }}">
                    <span class="li__icon tags"></span>
                    <span class="li__text">@lang('dashboard.navigation.Tags')</span>
                </div>
            </a>
        </li>

        <li>
            <small class="li__item-split text-muted">@lang('dashboard.navigation.Secondary tables')</small>
        </li>

        <li>
            <a href="{{ route('admin.users') }}">
                <div class="li__item {{ Route::is('admin.users') ? 'active' : '' }}">
                    <span class="li__icon user"></span>
                    <span class="li__text">@lang('dashboard.navigation.Users')</span>
                </div>
            </a>
        </li>

        <li>
            <a href="{{ route('admin.articles') }}">
                <div class="li__item {{ Route::is('admin.articles') ? 'active' : '' }}">
                    <span class="li__icon articles"></span>
                    <span class="li__text">@lang('dashboard.navigation.Articles')</span>
                </div>
            </a>
        </li>
    </ul>
</aside>
