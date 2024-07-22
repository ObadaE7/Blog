<x-modal>
    <x-slot:id>deleteModal</x-slot:id>
    <x-slot:title>
        <div class="d-flex align-items-center gap-2">
            <span class="material-symbols-outlined text-danger">dangerous</span>
            <span>@lang('dashboard.profile.Confirm delete')</span>
        </div>
    </x-slot:title>
    <x-slot:body>
        <div class="d-flex flex-column gap-3">
            <div>
                <small class="text-muted">@lang('dashboard.profile.Confirm delete account warning')</small>
            </div>

            <div>
                <label for="current_password_account">@lang('dashboard.profile.Current password')</label>
                <div class="input-password">
                    <input wire:model='current_password_account' type="password" id="current_password_account"
                        class="form-control" placeholder="@lang('dashboard.profile.Current password placeholder')">
                    <span class="material-symbols-outlined input-password-icon">visibility</span>
                </div>
                <x-error name="current_password_account" />
            </div>
        </div>
    </x-slot:body>
    <x-slot:button>
        <button wire:click='resetFields' type="button" class="btn btn-secondary" data-bs-dismiss="modal">
            @lang('dashboard.modal.Close')
        </button>
        <button wire:click='deleteAccount' type="button" class="btn btn-danger">
            <div class="d-flex align-items-center gap-2">
                <span class="material-symbols-outlined fs-6">delete</span>
                @lang('dashboard.modal.Delete')
            </div>
        </button>
    </x-slot:button>
</x-modal>
