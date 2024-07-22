<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        @if (Request::is('dashboard/*'))
            <li class="breadcrumb-item">
                <span class="material-symbols-outlined">dashboard</span>
            </li>
        @endif
        {{ $slot }}
    </ol>
</nav>
