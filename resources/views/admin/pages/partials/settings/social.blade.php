<div class="tab-pane fade {{ $tab == 'social' ? 'show active' : '' }}" id="v-pills-{{ $tab }}" role="tabpanel"
    aria-labelledby="v-pills-{{ $tab }}-tab" tabindex="0">

    <div class="wrapper__social">
        <div class="section__title">
            <span>@lang('dashboard.settings.Social title')</span>
        </div>

        <span>@lang('dashboard.settings.Social subtitle')</span>

        <div class="wrapper__social-content">
            <form>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <div class="d-flex justify-content-between">
                            <div class="d-flex align-items-center gap-2">
                                <span class="mt-2"><i class="fi fi-brands-facebook"></i></span>
                                <label for="facebook">@lang('dashboard.settings.Facebook')</label>
                            </div>
                            <x-success name="facebook" />
                        </div>
                        <input wire:model.blur='facebook' type="url" id="facebook" class="form-control"
                            placeholder="@lang('dashboard.settings.Facebook placeholder')">
                        <x-error name="facebook" />
                    </div>

                    <div class="col-md-6">
                        <div class="d-flex justify-content-between">
                            <div class="d-flex align-items-center gap-2">
                                <span class="mt-2"><i class="fi fi-brands-instagram"></i></span>
                                <label for="instagram">@lang('dashboard.settings.Instagram')</label>
                            </div>
                            <x-success name="instagram" />
                        </div>
                        <input wire:model.blur='instagram' type="url" id="instagram" class="form-control"
                            placeholder="@lang('dashboard.settings.Instagram placeholder')">
                        <x-error name="instagram" />
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <div class="d-flex justify-content-between">
                            <div class="d-flex align-items-center gap-2">
                                <span class="mt-2"><i class="fi fi-brands-twitter-alt"></i></span>
                                <label for="twitter">@lang('dashboard.settings.Twitter')</label>
                            </div>
                            <x-success name="twitter" />
                        </div>
                        <input wire:model.blur='twitter' type="url" id="twitter" class="form-control"
                            placeholder="@lang('dashboard.settings.Twitter placeholder')">
                        <x-error name="twitter" />
                    </div>

                    <div class="col-md-6">
                        <div class="d-flex justify-content-between">
                            <div class="d-flex align-items-center gap-2">
                                <span class="mt-2"><i class="fi fi-brands-youtube"></i></span>
                                <label for="youtube">@lang('dashboard.settings.Youtube')</label>
                            </div>
                            <x-success name="youtube" />
                        </div>
                        <input wire:model.blur='youtube' type="url" id="youtube" class="form-control"
                            placeholder="@lang('dashboard.settings.Youtube placeholder')">
                        <x-error name="youtube" />
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
