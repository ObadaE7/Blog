<aside class="wrapper__aside">
    <ul>
        <li>
            <a href="{{ route('dashboard.profile') }}">
                <div class="li__item {{ Route::is('dashboard.profile') ? 'active' : '' }}">
                    <span class="li__icon profile"></span>
                    <span class="li__text">@lang('dashboard.navigation.Profile')</span>
                </div>
            </a>
        </li>
        <li>
            <a href="{{ route('index') }}">
                <div class="li__item">
                    <span class="li__icon index"></span>
                    <span class="li__text">@lang('dashboard.navigation.Home')</span>
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
            <a href="{{ route('dashboard.analysis') }}">
                <div class="li__item {{ Route::is('dashboard.analysis') ? 'active' : '' }}">
                    <span class="li__icon analysis"></span>
                    <span class="li__text">@lang('dashboard.navigation.Analysis')</span>
                </div>
            </a>
        </li>
        <li>
            <a href="{{ route('dashboard.articles') }}">
                <div class="li__item {{ Route::is('dashboard.articles') ? 'active' : '' }}">
                    <span class="li__icon articles"></span>
                    <span class="li__text">@lang('dashboard.navigation.Articles')</span>
                </div>
            </a>
        </li>
        <li>
            <a href="{{ route('dashboard.create.article') }}">
                <div class="li__item {{ Route::is('dashboard.create.article') ? 'active' : '' }}">
                    <span class="li__icon create-article"></span>
                    <span class="li__text">@lang('dashboard.navigation.Create')</span>
                </div>
            </a>
        </li>
    </ul>
</aside>
