<x-modal>
    <x-slot:id>deleteModal</x-slot:id>
    <x-slot:title>
        <div class="d-flex align-items-center gap-2">
            <span class="material-symbols-outlined">bookmarks</span>
            <span>@lang('dashboard.modal.tags.Delete tag title')</span>
        </div>
    </x-slot:title>
    <x-slot:body>@lang('dashboard.modal.tags.Delete tag warning')</x-slot:body>
    <x-slot:button>
        <button wire:click="resetFields" type="button" class="btn btn-secondary" data-bs-dismiss="modal">
            @lang('dashboard.modal.Close')
        </button>
        <button wire:click='delete({{ $rowId }})' type="button" class="btn btn-danger">
            <div class="d-flex align-items-center gap-2">
                <span class="material-symbols-outlined fs-6">delete</span>
                <span>@lang('dashboard.modal.Delete')</span>
            </div>
        </button>
    </x-slot:button>
</x-modal>
