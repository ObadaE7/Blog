<div class="profile__header-cover">
    @if ($cover && !$errors->has('cover'))
        <img src="{{ $cover->temporaryUrl() }}" alt="@lang('dashboard.profile.Temp cover')">
    @else
        @php
            $coverImage = auth()->user()->imageable()->where('type', 'cover')->first();
        @endphp
        <img src="{{ $coverImage ? asset('storage/' . $coverImage->url) : asset('assets/img/others/cover.png') }}"
            alt="@lang('dashboard.profile.Profile cover')">
    @endif
    <div class="btn__cover-position">
        <label for="cover" class="btn__cover" data-bs-toggle="tooltip" data-bs-placement="top"
            data-bs-custom-class="primary-tooltip" data-bs-title="@lang('dashboard.profile.Change cover')">
            <input wire:model="cover" id="cover" type="file" accept="image/png, image/jpg, image/jpeg" hidden>
        </label>
    </div>
</div>
