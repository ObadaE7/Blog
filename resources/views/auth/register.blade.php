<x-guest-layout>
    <section class="wrapper auth">
        @livewire('home.header')

        <section class="auth__wrapper">
            <div class="auth__wrapper-main">
                <span class="fs-4 mb-3">@lang('auth.Create a new account')</span>

                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="auth__wrapper-form">
                        <div class="row row-cols-md-2 row-cols-1">
                            <div class="col">
                                <label for="fname">@lang('auth.First name')</label>
                                <input type="text" name="fname" id="fname" class="form-control"
                                    value="{{ old('fname') }}" placeholder="@lang('auth.First name placeholder')" autofocus required>
                                <x-error name="fname" />
                            </div>

                            <div class="col">
                                <label for="lname">@lang('auth.Last name')</label>
                                <input type="text" name="lname" id="lname" class="form-control"
                                    value="{{ old('lname') }}" placeholder="@lang('auth.Last name placeholder')" required>
                                <x-error name="lname" />
                            </div>
                        </div>

                        <div>
                            <label for="uname">@lang('auth.User name')</label>
                            <input type="text" name="uname" id="uname" class="form-control"
                                value="{{ old('uname') }}" placeholder="@lang('auth.Username placeholder')" required>
                            <x-error name="uname" />
                        </div>

                        <div>
                            <label for="email">@lang('auth.Email')</label>
                            <input type="email" id="email" name="email" class="form-control"
                                value="{{ old('email') }}" placeholder="@lang('auth.Email placeholder')" required />
                            <x-error name="email" />
                        </div>

                        <div>
                            <label for="password">@lang('auth.Password')</label>
                            <div class="input-password">
                                <input type="password" id="password" name="password" class="form-control"
                                    placeholder="@lang('auth.Password placeholder')" required />
                                <span class="material-symbols-outlined input-password-icon">visibility</span>
                            </div>
                            <x-error name="password" />
                        </div>

                        <div>
                            <label for="password_confirmation">@lang('auth.Confirm password')</label>
                            <div class="input-password">
                                <input type="password" name="password_confirmation" id="password_confirmation"
                                    class="form-control" placeholder="@lang('auth.Retype the password')" required>
                                <span class="material-symbols-outlined input-password-icon">visibility</span>
                            </div>
                            <x-error name="password_confirmation" />
                        </div>

                        <div class="d-flex justify-content-end">
                            <button class="btn btn-primary px-5">@lang('auth.Register')</button>
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
