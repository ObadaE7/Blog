<div class="tab-pane fade {{ $tab == 'general' ? 'show active' : '' }}" id="v-pills-{{ $tab }}" role="tabpanel"
    aria-labelledby="v-pills-{{ $tab }}-tab" tabindex="0">
    <div class="wrapper__general">
        <div class="wrapper__general-info">
            <div class="section__title">
                <span>@lang('dashboard.settings.General title')</span>
            </div>

            <span>@lang('dashboard.settings.General subtitle')</span>

            <form>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <div class="d-flex justify-content-between">
                            <label for="name">@lang('dashboard.settings.SiteName')</label>
                            <x-success name="name" />
                        </div>
                        <input wire:model.blur='name' type="text" id="name" class="form-control"
                            placeholder="@lang('dashboard.settings.SiteName placeholder')">
                        <x-error name="name" />
                    </div>

                    <div class="col-md-6">
                        <div class="d-flex justify-content-between">
                            <label for="language">@lang('dashboard.settings.SiteLanguage')</label>
                            <x-success name="language" />
                        </div>
                        <select wire:model.blur='language' class="form-select" id="language">
                            <option value="" selected>@lang('dashboard.settings.SiteLanguage placeholder')</option>
                            @foreach (config('locales') as $localeCode => $properites)
                                <option value="{{ $localeCode }}"
                                    {{ $localeCode == app()->getLocale() ? 'selected' : '' }}>
                                    {{ $properites['name'] }}
                                </option>
                            @endforeach
                        </select>
                        <x-error name="language" />
                    </div>
                </div>

                <div class="mb-3">
                    <div class="d-flex justify-content-between">
                        <label for="description">@lang('dashboard.settings.SiteDescription')</label>
                        <x-success name="description" />
                    </div>
                    <x-markdown-editor name='description' id='description'
                        placeholder="dashboard.settings.SiteDescription placeholder" />
                    <x-error name="description" />
                </div>

                <div class="mb-3">
                    <div class="d-flex justify-content-between">
                        <label for="keywords">@lang('dashboard.settings.Keywords')</label>
                        <x-success name="keywords" />
                    </div>
                    <x-markdown-editor name='keywords' id='keywords'
                        placeholder="dashboard.settings.Keywords placeholder" />
                    <x-error name="keywords" />
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <div class="d-flex justify-content-between">
                            <label for="email">@lang('dashboard.settings.Email')</label>
                            <x-success name="email" />
                        </div>
                        <input wire:model.blur='email' type="email" id="email" class="form-control"
                            placeholder="@lang('dashboard.settings.Email placeholder')">
                        <x-error name="email" />
                    </div>

                    <div class="col-md-6">
                        <div class="d-flex justify-content-between">
                            <label for="phone">@lang('dashboard.settings.Phone')</label>
                            <x-success name="phone" />
                        </div>
                        <input wire:model.blur='phone' type="text" id="phone" class="form-control"
                            placeholder="@lang('dashboard.settings.Phone placeholder')">
                        <x-error name="phone" />
                    </div>
                </div>

                <div class="mb-3">
                    <div class="d-flex justify-content-between">
                        <label for="address">@lang('dashboard.settings.Address')</label>
                        <x-success name="address" />
                    </div>
                    <input wire:model.blur='address' type="text" id="address" class="form-control"
                        placeholder="@lang('dashboard.settings.Address placeholder')">
                    <x-error name="address" />
                </div>
            </form>
        </div>

        <div class="wrapper__general-icon">
            <div class="section__title">
                <span>@lang('dashboard.settings.Favicon')</span>
            </div>
            <form>
                <div class="d-flex flex-column mb-3">
                    <div class="d-flex gap-4">
                        <div class="d-flex flex-column mb-3">
                            <label class="siteImageLabel">
                                @if ($existingFavicon)
                                    <img src="{{ asset('storage/' . $existingFavicon) }}" class="rounded"
                                        alt="{{ config('app.name') . ' Icon' }}">
                                @endif
                            </label>
                        </div>

                        <div class="d-flex flex-column mb-3">
                            <label for="favicon" class="siteImageLabel">
                                @if ($favicon && !$errors->has('favicon'))
                                    <img src="{{ $favicon->temporaryURL() }}" alt="{{ config('app.name') . ' Icon' }}">
                                @else
                                    <span class="material-symbols-outlined text-muted">add_photo_alternate</span>
                                    <span class="text-muted">@lang('dashboard.settings.LabelText')</span>
                                @endif
                            </label>
                            <input wire:model='favicon' type="file" accept="image/x-icon" id="favicon"
                                class="form-control" hidden>
                            <x-success name="favicon" />
                            <x-error name="favicon" />
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <div class="wrapper__general-logo">
            <div class="section__title">
                <span>@lang('dashboard.settings.SiteLogo')</span>
            </div>
            <form>
                <div class="row">
                    <div class="col-md-6">
                        <div class="d-flex flex-column">
                            <label>@lang('dashboard.settings.SiteLightLogo')</label>
                            <div class="d-flex gap-4">
                                <div class="d-flex flex-column">
                                    <label class="siteImageLabel bg-secondary">
                                        @if ($existingLogoLight)
                                            <img src="{{ asset('storage/' . $existingLogoLight) }}" class="rounded"
                                                alt="{{ config('app.name' . ' Light Logo') }}">
                                        @endif
                                    </label>
                                </div>

                                <div class="d-flex flex-column">
                                    <label for="logoLight" class="siteImageLabel bg-secondary">
                                        @if ($logoLight && !$errors->has('logoLight'))
                                            <img src="{{ $logoLight->temporaryURL() }}"
                                                alt="{{ config('app.name' . ' Light Logo') }}">
                                        @else
                                            <span
                                                class="material-symbols-outlined text-white">add_photo_alternate</span>
                                            <span class="text-white">@lang('dashboard.settings.LabelText')</span>
                                        @endif
                                    </label>
                                    <input wire:model='logoLight' type="file"
                                        accept="image/png, image/jpg, image/jpeg" id="logoLight" class="form-control"
                                        hidden>
                                    <x-success name="logoLight" />
                                    <x-error name="logoLight" />
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="d-flex flex-column">
                            <label>@lang('dashboard.settings.SiteDarkLogo')</label>
                            <div class="d-flex gap-4">
                                <div class="d-flex flex-column">
                                    <label class="siteImageLabel">
                                        @if ($existingLogoDark)
                                            <img src="{{ asset('storage/' . $existingLogoDark) }}" class="rounded"
                                                alt="{{ config('app.name' . ' Dark Logo') }}">
                                        @endif
                                    </label>
                                </div>

                                <div class="d-flex flex-column">
                                    <label for="logoDark" class="siteImageLabel">
                                        @if ($logoDark && !$errors->has('logoDark'))
                                            <img src="{{ $logoDark->temporaryURL() }}"
                                                alt="{{ config('app.name' . ' Dark Logo') }}">
                                        @else
                                            <span
                                                class="material-symbols-outlined text-muted">add_photo_alternate</span>
                                            <span class="text-muted">@lang('dashboard.settings.LabelText')</span>
                                        @endif
                                    </label>
                                    <input wire:model='logoDark' type="file"
                                        accept="image/png, image/jpg, image/jpeg" id="logoDark" class="form-control"
                                        hidden>
                                    <x-success name="logoDark" />
                                    <x-error name="logoDark" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
