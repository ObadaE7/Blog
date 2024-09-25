@section('breadcrumb')
    <x-breadcrumb>
        <li class="breadcrumb-item">
            <a href="{{ route('dashboard.profile') }}">
                @lang('dashboard.navigation.Profile')
            </a>
        </li>
        <li class="breadcrumb-item active" aria-current="page">
            <a>@lang('dashboard.navigation.My Profile')</a>
        </li>
    </x-breadcrumb>
@endsection

<div>
    <x-alert status="success" color="success" />
    <x-alert status="error" color="danger" />

    <section class="profile__wrapper">
        <div class="profile__right">
            @include('pages.dashboard.partials.personal-info')
            @include('pages.dashboard.partials.about-me')
            @include('pages.dashboard.partials.change-email')
            @include('pages.dashboard.partials.change-password')
        </div>

        <div class="profile__left">
            <div class="profile__banner">
                <div class="profile__header">
                    @include('pages.dashboard.partials.change-cover')
                    @include('pages.dashboard.partials.change-avatar')
                </div>

                <div class="profile__info">
                    <span>{{ $fname . ' ' . $lname }}</span>
                    <div class="gap-1 d-flex align-items-center text-muted">
                        <span class="material-symbols-outlined fs-6">alternate_email</span>
                        <span>{{ $uname }}</span>
                    </div>
                </div>
            </div>

            <div class="profile__account">
                <div class="d-flex flex-column">
                    <label for="delete-account-btn">@lang('dashboard.profile.Delete account')</label>
                    <small class="text-muted">@lang('dashboard.profile.Delete account warning')</small>
                </div>
                <button id="delete-account-btn" class="btn bg-danger-subtle text-danger fw-bold" data-bs-toggle="modal"
                    data-bs-target="#deleteModal">
                    @lang('dashboard.profile.Delete my account')
                </button>
                @include('pages.dashboard.partials.delete-account')
            </div>
        </div>
    </section>
</div>

@push('scripts')
    <script src="{{ asset('js/scripts.js') }}"></script>
    <script>
        togglePassword();

        document.addEventListener('livewire:navigated', () => {
            Livewire.on('resetSuccessMessage', (field) => {
                setTimeout(() => {
                    @this.resetSuccessMessage(field);
                }, 3000);
            })
        });
    </script>
@endpush
