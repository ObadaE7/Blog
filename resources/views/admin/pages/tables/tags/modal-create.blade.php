<x-modal>
    <x-slot:id>createModal</x-slot:id>
    <x-slot:title>
        <div class="d-flex align-items-center gap-2">
            <span class="material-symbols-outlined">bookmarks</span>
            <span>@lang('dashboard.modal.tags.Create tag title')</span>
        </div>
    </x-slot:title>
    <x-slot:body>
        <form>
            <div class="mb-3 mt-3">
                <label for="name">@lang('dashboard.modal.tags.Name')</label>
                <input wire:model.blur='name' type="text" id="name" class="form-control"
                    placeholder="@lang('dashboard.modal.tags.Name placeholder')">
                <x-error name="name" />
            </div>

            <div class="mb-3 mt-3">
                <label for="slug">@lang('dashboard.modal.tags.Slug')</label>
                <input wire:model='slug' type="text" id="slug" class="form-control"
                    placeholder="@lang('dashboard.modal.tags.Slug placeholder')">
                <x-error name="slug" />
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
