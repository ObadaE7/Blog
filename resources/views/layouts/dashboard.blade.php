<x-app-layout>
    <section class="wrapper">
        @if (Request::is('admin/*'))
            @include('admin.includes.header')
        @else
            @include('includes.dashboard.header')
        @endif
        <main class="wrapper__main">
            @if (Request::is('admin/*'))
                @include('admin.includes.aside')
            @else
                @include('includes.dashboard.aside')
            @endif
            <main class="wrapper__content">
                <div class="wrapper__breadcrumb">
                    @yield('breadcrumb')
                </div>
                <div class="wrapper__content-content">
                    @yield('content')
                </div>
            </main>
        </main>
    </section>
    @push('css')
        <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    @endpush
</x-app-layout>
