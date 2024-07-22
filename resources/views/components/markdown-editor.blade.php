<div>
    <div wire:ignore>
        <textarea wire:model='{{ $name }}' id="{{ $id }}" class="form-control"></textarea>
    </div>

    @push('css')
        <link rel="stylesheet" href="https://unpkg.com/easymde/dist/easymde.min.css">
    @endpush

    @push('scripts')
        <script src="https://unpkg.com/easymde/dist/easymde.min.js"></script>
        <script>
            document.addEventListener('livewire:navigated', function() {
                const easyMDE = new EasyMDE({
                    element: document.getElementById(@json($id)),
                    minHeight: "100px",
                    placeholder: @json(__($placeholder)),
                });

                easyMDE.codemirror.on('blur', function() {
                    @this.set(@json($name), easyMDE.value());
                });
            });
        </script>
    @endpush
</div>
