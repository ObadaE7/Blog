<footer class="wrapper__footer">
    <div class="wrapper__footer-top">
        <div class="footer__top-logo">
            <img src="{{ asset($settings->logo_light ? 'storage/' . $settings->logo_light : 'storage/img/logo/jeveline-logo-white-v1.png') }}"
                alt="Jeveline Logo">
        </div>
        <div class="footer__top-about">
            <span class="fs-5">@lang('index.header.About us')</span>
            <small>
                @lang('index.header.About us text')
            </small>
        </div>

        <div class="footer__top-links">
            <span class="fs-5">@lang('index.header.Quick link')</span>
            <ul>
                <li><a href="{{ route('about') }}" class="menu-link">@lang('index.header.About us')</a></li>
                <li><a href="{{ route('contact') }}" class="menu-link">@lang('index.header.Contact us')</a></li>
                <li><a href="{{ route('privacy.policy') }}" class="menu-link">@lang('index.header.Privacy policy')</a></li>
            </ul>
        </div>

        <div class="footer__top-contact">
            <span class="fs-5">@lang('index.header.Contact us')</span>
            <ul>
                <li>@lang('index.header.Email') {{ $settings->email ?? 'Null' }}</li>
                <li>@lang('index.header.Phone') {{ $settings->phone ?? 'Null' }}</li>
                <li>@lang('index.header.Address') {{ $settings->address ?? 'Null' }}</li>
            </ul>
        </div>
    </div>

    <div class="wrapper__footer-bottom">
        <div class="footer__bottom-copyright">
            <span>
                &copy; @lang('index.header.Copyright') {{ $settings->name ?? config('app.name') }} &ndash; {{ Date('Y') }}
            </span>
        </div>

        <div class="footer__bottom-social">
            <div class="d-flex justify-content-center justify-content-lg-end gap-4">
                <a href="{{ $settings->facebook ?? '#' }}" target="_blank" aria-label="Facebook">
                    <i class="fi fi-brands-facebook"></i>
                </a>
                <a href="{{ $settings->instagram ?? '#' }}" target="_blank" aria-label="Instagram">
                    <i class="fi fi-brands-instagram"></i>
                </a>
                <a href="{{ $settings->twitter ?? '#' }}" target="_blank" aria-label="Twitter">
                    <i class="fi fi-brands-twitter-alt"></i>
                </a>
                <a href="{{ $settings->youtube ?? '#' }}" target="_blank" aria-label="YouTube">
                    <i class="fi fi-brands-youtube"></i>
                </a>
            </div>
        </div>
    </div>
</footer>
