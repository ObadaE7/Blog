<section class="wrapper">
    @livewire('home.header')

    <div class="contact__wrapper">
        <div class="contact__wrapper-content">
            <div class="section__title">
                <span>@lang('index.pages.Contact us')</span>
            </div>

            <x-alert status='success' color='success'></x-alert>
            <x-alert status='error' color='danger'></x-alert>

            <form>
                <div class="mb-3">
                    <label for="name">@lang('index.pages.Name')</label>
                    <input wire:model='name' type="text" id="name" class="form-control"
                        placeholder="@lang('index.pages.Name placeholder')" required>
                    <x-error name='name' />
                </div>

                <div class="mb-3">
                    <label for="email">@lang('index.pages.Email')</label>
                    <input wire:model='email' type="email" id="email" class="form-control"
                        placeholder="@lang('index.pages.Email placeholder')" required>
                    <x-error name='email' />
                </div>

                <div class="mb-3">
                    <label for="message">@lang('index.pages.Message')</label>
                    <textarea wire:model='message' id="message" class="form-control" rows="5" placeholder="@lang('index.pages.Message placeholder')"
                        required></textarea>
                    <x-error name='message' />
                </div>

                <div class="d-flex justify-content-end">
                    <button wire:click.prevent='submit' type="button" class="btn btn__orange px-5">
                        @lang('index.pages.Send')
                    </button>
                </div>
            </form>
        </div>
    </div>

    @livewire('home.footer')
</section>
