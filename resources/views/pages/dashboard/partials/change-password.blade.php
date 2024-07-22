<div class="profile__right-row">
    <span class="text-muted">@lang('dashboard.profile.Update password')</span>
    <form>
        <div class="row mt-2">
            <div class="col-md-12 mb-3">
                <label for="current_password">@lang('dashboard.profile.Current password')</label>
                <div class="input-password">
                    <input wire:model='current_password' type="password" id="current_password" class="form-control"
                        placeholder="@lang('dashboard.profile.Current password placeholder')">
                    <span class="material-symbols-outlined input-password-icon">visibility</span>
                </div>
                <x-error name="current_password" />
            </div>

            <div class="col-md-12 mb-3">
                <div class="d-flex justify-content-between">
                    <label for="password">@lang('dashboard.profile.New password')</label>
                    <x-success name="password" />
                </div>
                <div class="input-password">
                    <input wire:model='password' type="password" id="password" class="form-control"
                        placeholder="@lang('dashboard.profile.New password placeholder')">
                    <span class="material-symbols-outlined input-password-icon">visibility</span>
                </div>
                <x-error name="password" />
            </div>

            <div class="col-md-12 mb-3">
                <label for="password_confirmation">@lang('dashboard.profile.Confirm password')</label>
                <div class="input-password">
                    <input wire:model='password_confirmation' type="password" id="password_confirmation"
                        class="form-control" placeholder="@lang('dashboard.profile.Confirm password placeholder')">
                    <span class="material-symbols-outlined input-password-icon">visibility</span>
                </div>
                <x-error name="password_confirmation" />
            </div>

            <div class="d-flex justify-content-end">
                <button wire:click.prevent='savePassword' class="btn btn-primary w-25">
                    @lang('dashboard.profile.Save')
                </button>
            </div>
        </div>
    </form>
</div>
