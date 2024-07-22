@section('breadcrumb')
    <x-breadcrumb>
        <li class="breadcrumb-item"><a href="{{ route('admin.articles') }}">{{ trans('string.Table') }}</a></li>
        <li class="breadcrumb-item active" aria-current="page"><a>{{ trans('string.Articles') }}</a></li>
    </x-breadcrumb>
@endsection

<div class="table__wrapper">
    <div class="table__filter">
        <x-table-filter :columns="$columns" :searchBy="$this->searchBy" :perPages="$perPages" optCreate="true" />
    </div>

    <div class="table__body">
        <x-alert status="success" color="success" />
        <x-alert status="error" color="danger" />

        <x-table>
            @section('thead')
                @foreach ($headers as $index => $header)
                    @php
                        $headerIgnore =
                            isset($columns[$index]) &&
                            $header !== trans('dashboard.table.Actions') &&
                            $header !== trans('dashboard.table.Image');
                    @endphp

                    <th scope="col"
                        @if ($headerIgnore) wire:click="setOrderBy('{{ $columns[$index] }}')" class="cursor-pointer" @endif>
                        <div class="d-flex align-items-center justify-content-between">
                            <span>{{ ucfirst($header) }}</span>
                            @if ($headerIgnore)
                                <span class="material-symbols-outlined">
                                    {{ $orderBy === $columns[$index] ? ($orderDir === 'asc' ? 'expand_less' : 'expand_more') : 'unfold_more' }}
                                </span>
                            @endif
                        </div>
                    </th>
                @endforeach
            @endsection

            @section('tbody')
                @forelse ($rows as $row)
                    <tr wire:key="{{ $row->id }}">
                        <td>
                            <img src="{{ asset($row->imageable ? 'storage/' . $row->imageable->url : '') }}"
                                class="table__img">
                        </td>
                        <td>{{ $row->title }}</td>
                        <td>
                            @foreach ($row->categories as $category)
                                {{ $category->name }}
                            @endforeach
                        </td>
                        <td>
                            @php
                                $status = $row->status == 'draft' ? 'secondary' : 'success';
                            @endphp
                            <span class="badge bg-{{ $status }}-subtle text-{{ $status }} p-2 rounded-1">
                                {{ Str::upper($row->status) }}
                            </span>
                        </td>
                        <td>
                            <div class="actions__btn">
                                <button wire:click="show({{ $row->id }})" class="btn btn-sm btn-success btn__show"
                                    data-bs-toggle="modal" data-bs-target="#showModal">
                                </button>
                                <button wire:click="edit({{ $row->id }})" class="btn btn-sm btn-primary btn__edit"
                                    data-bs-toggle="modal" data-bs-target="#editModal">
                                </button>
                                <button wire:click="$set('rowId', {{ $row->id }})"
                                    class="btn btn-sm btn-danger btn__delete" data-bs-toggle="modal"
                                    data-bs-target="#deleteModal">
                                </button>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="{{ count($headers) }}" class="text-center">@lang('dashboard.table.No results found')</td>
                    </tr>
                @endforelse
            @endsection
        </x-table>
    </div>

    <div class="table__paginate">{{ $rows->links() }}</div>

    <div class="table__modals">
        @include('admin.pages.tables.articles.modal-create')
        @include('admin.pages.tables.articles.modal-edit')
        @include('admin.pages.tables.articles.modal-delete')
    </div>
</div>

@push('scripts')
    <script>
        document.addEventListener('livewire:navigated', () => {
            Livewire.on('urlReset', url => {
                history.pushState(null, null, url);
            });
        });

        document.addEventListener('closeModal', event => {
            $('#' + event.detail.modalId).modal('hide');
        });
    </script>
@endpush
