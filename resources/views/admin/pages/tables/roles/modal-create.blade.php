<x-modal>
    <x-slot:id>createModal</x-slot:id>
    <x-slot:title>
        <div class="d-flex align-items-center gap-2">
            <span class="material-symbols-outlined">supervisor_account</span>
            <span>@lang('dashboard.modal.roles.Create role title')</span>
        </div>
    </x-slot:title>
    <x-slot:body>
        <form>
            <div class="mb-3 mt-3">
                <label for="name">@lang('dashboard.modal.roles.Name')</label>
                <input wire:model='name' type="text" id="name" class="form-control" placeholder="@lang('dashboard.modal.roles.Name placeholder')">
                <x-error name="name" />
            </div>

            <div class="mb-3">
                <label for="description">@lang('dashboard.modal.roles.Description')</label>
                <textarea wire:model='description' id="description" class="form-control" placeholder="@lang('dashboard.modal.roles.Description placeholder')" cols="30"
                    rows="5"></textarea>
                <x-error name="description" />
            </div>

            <x-slot:button>
                <button wire:click="resetFields" type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                    @lang('dashboard.modal.Close')
                </button>
                <button wire:click.prevent='create' type="button" class="btn btn-primary">
                    <div class="d-flex align-items-center gap-2">
                        <span class="material-symbols-outlined fs-6">add</span>
                        <span>@lang('dashboard.modal.Create')</span>
                    </div>
                </button>
            </x-slot:button>
        </form>
    </x-slot:body>
</x-modal>
