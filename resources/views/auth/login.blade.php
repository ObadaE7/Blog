<x-guest-layout>
    <section class="wrapper auth">
        @livewire('home.header')

        <section class="auth__wrapper">
            <div class="auth__wrapper-main">
                <span class="d-flex justify-content-center fs-4 mb-3">@lang('auth.Login')</span>

                <x-alert status="success" color="success" />
                <x-alert status="error" color="danger" />

                <form method="POST" action="{{ route($routePrefix . 'login') }}">
                    @csrf
                    <div class="auth__wrapper-form">
                        <div>
                            <label for="email">@lang('auth.Email')</label>
                            <input type="email" id="email" name="email" class="form-control"
                                value="{{ old('email') }}" placeholder="@lang('auth.Email placeholder')" required autofocus />
                        </div>

                        <div>
                            <label for="password">@lang('auth.Password')</label>
                            <div class="input-password">
                                <input type="password" id="password" name="password" class="form-control"
                                    value="{{ old('password') }}" placeholder="@lang('auth.Password placeholder')" required />
                                <span class="material-symbols-outlined input-password-icon">visibility</span>
                            </div>
                        </div>

                        <div class="d-flex justify-content-between">
                            <div class="d-flex align-items-center gap-2">
                                <input id="remember" type="checkbox" class="form-check-input m-0" name="remember">
                                <label for="remember">@lang('auth.Remember me')</label>
                            </div>
                            <div>
                                @if (Route::has('password.request'))
                                    <a href="{{ route('password.request') }}">
                                        @lang('auth.Forgot your password')
                                    </a>
                                @endif
                            </div>
                        </div>

                        <div class="d-flex flex-column gap-3">
                            <button class="btn btn-primary w-100 fs-5">
                                @lang('auth.Login')
                            </button>

                            <div class="divider"><span>@lang('auth.Or')</span></div>

                            <div class="d-flex justify-content-center gap-4">
                                <div class="social__links">
                                    <a href="#">
                                        <img src="{{ asset('assets/img/svg/google.svg') }}" alt="Google">
                                    </a>
                                </div>
                                <div class="social__links">
                                    <a href="#">
                                        <img src="{{ asset('assets/img/svg/twitterx.svg') }}" alt="Twitterx">
                                    </a>
                                </div>
                                <div class="social__links">
                                    <a href="#">
                                        <img src="{{ asset('assets/img/svg/facebook.svg') }}" alt="Facebook">
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex flex-column align-items-center gap-1">
                            <div>
                                <span>@lang('auth.Dont have an account')</span>
                                <a href="{{ route('register') }}">@lang('auth.Create account')</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </section>

        @livewire('home.footer')
    </section>

    @push('scripts')
        <script src="{{ asset('js/scripts.js') }}"></script>
        <script>
            togglePassword()
        </script>
    @endpush
</x-guest-layout>
