@section('breadcrumb')
    <x-breadcrumb>
        <li class="breadcrumb-item"><a href="{{ route('admin.settings') }}">{{ trans('dashboard.navigation.Settings') }}</a>
        </li>
        <li class="breadcrumb-item active" aria-current="page"><a>{{ trans('dashboard.navigation.Site Settings') }}</a></li>
    </x-breadcrumb>
@endsection

<div>
    <x-alert status="success" color="success" />
    <x-alert status="error" color="danger" />

    <section class="settings__wrapper general">
        <div class="d-flex flex-column gap-3">
            <div class="nav nav-pills gap-2" id="v-pills-tab" role="tablist" aria-orientation="horizontal">
                <button wire:click.prevent="$set('tab', 'general')"
                    class="nav-link {{ $tab == 'general' ? 'active' : '' }}" id="v-pills-{{ $tab }}-tab"
                    data-bs-toggle="pill" data-bs-target="#v-pills-{{ $tab }}" type="button" role="tab"
                    aria-controls="v-pills-{{ $tab }}" aria-selected="true">
                    <div class="d-flex align-items-center gap-2">
                        <span class="material-symbols-outlined">language</span>
                        <span>@lang('dashboard.settings.General')</span>
                    </div>
                </button>

                <button wire:click.prevent="$set('tab', 'social')"
                    class="nav-link {{ $tab == 'social' ? 'active' : '' }}" id="v-pills-{{ $tab }}-tab"
                    data-bs-toggle="pill" data-bs-target="#v-pills-{{ $tab }}" type="button" role="tab"
                    aria-controls="v-pills-{{ $tab }}" aria-selected="true">
                    <div class="d-flex align-items-center gap-2">
                        <span class="material-symbols-outlined">link</span>
                        <span>@lang('dashboard.settings.Social')</span>
                    </div>
                </button>
            </div>

            <div class="tab-content" id="v-pills-tabContent">
                @include('admin.pages.partials.settings.general')
                @include('admin.pages.partials.settings.social')
            </div>
        </div>
    </section>
</div>

@push('scripts')
    <script>
        document.addEventListener('livewire:navigated', () => {
            Livewire.on('resetSuccessMessage', (field) => {
                setTimeout(() => {
                    @this.resetSuccessMessage(field);
                }, 3000);
            })
        });
    </script>
@endpush
