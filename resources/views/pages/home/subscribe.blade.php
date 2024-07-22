<div class="section__one-left-subscribe">
    <span>@lang('index.sections.Newsletter')</span>
    <span class="text-muted">@lang('index.sections.Subscribe')</span>
    <form>
        <div class="d-flex flex-column gap-3">
            <input wire:model='email' type="email" class="form-control" placeholder="@lang('index.sections.Email placeholder')">
            <button wire:click.prevent='subscribe' class="btn-subscribe">@lang('index.sections.Subscribe btn')</button>
        </div>
        <div class="text-center">
            <x-error name="email" />
            <x-success name="success" />
        </div>
    </form>
</div>
