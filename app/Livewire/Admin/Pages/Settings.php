<?php

namespace App\Livewire\Admin\Pages;

use App\Models\Setting;
use Livewire\Attributes\Url;
use Livewire\{Component, WithFileUploads};
use Illuminate\Support\Facades\{Config, Storage, Log};
use Exception;

class Settings extends Component
{
    use WithFileUploads;

    public $name;
    public $description;
    public $keywords;
    public $language;
    public $email;
    public $phone;
    public $address;
    public $favicon;
    public $logoLight;
    public $logoDark;
    public $facebook;
    public $instagram;
    public $twitter;
    public $youtube;
    public $existingFavicon;
    public $existingLogoLight;
    public $existingLogoDark;


    #[Url(history: true)]
    public $tab = 'general';

    public function updatedName()
    {
        $validated = $this->validateOnly('name', ['name' => ['required', 'string']]);
        try {
            Setting::updateOrCreate(['id' => 1], ['name' => $validated['name']]);
            session()->flash('name', trans('alerts.profile.Updated'));
            $this->dispatch('resetSuccessMessage', field: 'name');
        } catch (Exception $e) {
            Log::error('[updatedName]: ' . $e->getMessage());
            session()->flash('error', trans('alerts.profile.Failed'));
        }
    }

    public function updatedDescription()
    {
        $validated = $this->validateOnly('description', ['description' => ['required', 'string']]);
        try {
            Setting::updateOrCreate(['id' => 1], ['description' => $validated['description']]);
            session()->flash('description', trans('alerts.profile.Updated'));
            $this->dispatch('resetSuccessMessage', field: 'description');
        } catch (Exception $e) {
            Log::error('[updatedDescription]: ' . $e->getMessage());
            session()->flash('error', trans('alerts.profile.Failed'));
        }
    }

    public function updatedKeywords()
    {
        $validated = $this->validateOnly('keywords', ['keywords' => ['required', 'string']]);
        try {
            Setting::updateOrCreate(['id' => 1], ['keywords' => $validated['keywords']]);
            session()->flash('keywords', trans('alerts.profile.Updated'));
            $this->dispatch('resetSuccessMessage', field: 'keywords');
        } catch (Exception $e) {
            Log::error('[updatedKeywords]: ' . $e->getMessage());
            session()->flash('error', trans('alerts.profile.Failed'));
        }
    }

    public function updatedLanguage()
    {
        $locales = implode(',', array_keys(Config::get('locales')));
        $validated = $this->validateOnly('language', ['language' => ['required', 'string', "in:{$locales}"]]);
        try {
            Setting::updateOrCreate(['id' => 1], ['language' => $validated['language']]);
            session()->flash('language', trans('alerts.profile.Updated'));
            $this->dispatch('resetSuccessMessage', field: 'language');
        } catch (Exception $e) {
            Log::error('[updatedLanguage]: ' . $e->getMessage());
            session()->flash('error', trans('alerts.profile.Failed'));
        }
    }

    public function updatedEmail()
    {
        $validated = $this->validateOnly('email', ['email' => ['required', 'email']]);
        try {
            Setting::updateOrCreate(['id' => 1], ['email' => $validated['email']]);
            session()->flash('email', trans('alerts.profile.Updated'));
            $this->dispatch('resetSuccessMessage', field: 'email');
        } catch (Exception $e) {
            Log::error('[updatedEmail]: ' . $e->getMessage());
            session()->flash('error', trans('alerts.profile.Failed'));
        }
    }

    public function updatedPhone()
    {
        $validated = $this->validateOnly('phone', ['phone' => ['required', 'numeric', 'digits:10']]);
        try {
            Setting::updateOrCreate(['id' => 1], ['phone' => $validated['phone']]);
            session()->flash('phone', trans('alerts.profile.Updated'));
            $this->dispatch('resetSuccessMessage', field: 'phone');
        } catch (Exception $e) {
            Log::error('[updatedPhone]: ' . $e->getMessage());
            session()->flash('error', trans('alerts.profile.Failed'));
        }
    }

    public function updatedAddress()
    {
        $validated = $this->validateOnly('address', ['address' => ['required', 'string']]);
        try {
            Setting::updateOrCreate(['id' => 1], ['address' => $validated['address']]);
            session()->flash('address', trans('alerts.profile.Updated'));
            $this->dispatch('resetSuccessMessage', field: 'address');
        } catch (Exception $e) {
            Log::error('[updatedAddress]: ' . $e->getMessage());
            session()->flash('error', trans('alerts.profile.Failed'));
        }
    }

    public function updatedFavicon()
    {
        $validated = $this->validateOnly('favicon', ['favicon' => ['required', 'file', 'mimes:ico', 'max:1024']]);
        try {
            $value = Setting::getValue('favicon');
            if ($value) {
                Storage::disk('public')->delete($value);
            }
            $iconPath = $validated['favicon']->store('settings/favicon', 'public');
            Setting::updateOrCreate(['id' => 1], ['favicon' => $iconPath]);
            session()->flash('favicon', trans('alerts.profile.Updated'));
            $this->dispatch('resetSuccessMessage', field: 'favicon');
        } catch (Exception $e) {
            Log::error('[updatedFavicon]: ' . $e->getMessage());
            session()->flash('error', trans('alerts.profile.Failed'));
        }
    }

    public function updatedLogoLight()
    {
        $validated = $this->validateOnly('logoLight', ['logoLight' => ['required', 'file', 'image', 'mimes:png,jpg,jpeg', 'max:1024']]);
        try {
            $value = Setting::getValue('logo_light');
            if ($value) {
                Storage::disk('public')->delete($value);
            }
            $logoPath = $validated['logoLight']->store('settings/logo', 'public');
            Setting::updateOrCreate(['id' => 1], ['logo_light' => $logoPath]);
            session()->flash('logoLight', trans('alerts.profile.Updated'));
            $this->dispatch('resetSuccessMessage', field: 'logoLight');
        } catch (Exception $e) {
            Log::error('[updatedLogoLight]: ' . $e->getMessage());
            session()->flash('error', trans('alerts.profile.Failed'));
        }
    }

    public function updatedLogoDark()
    {
        $validated = $this->validateOnly('logoDark', ['logoDark' => ['required', 'file', 'image', 'mimes:png,jpg,jpeg', 'max:1024']]);
        try {
            $value = Setting::getValue('logo_dark');
            if ($value) {
                Storage::disk('public')->delete($value);
            }
            $logoPath = $validated['logoDark']->store('settings/logo', 'public');
            Setting::updateOrCreate(['id' => 1], ['logo_dark' => $logoPath]);
            session()->flash('logoDark', trans('alerts.profile.Updated'));
            $this->dispatch('resetSuccessMessage', field: 'logoDark');
        } catch (Exception $e) {
            Log::error('[updatedLogoDark]: ' . $e->getMessage());
            session()->flash('error', trans('alerts.profile.Failed'));
        }
    }

    public function updatedFacebook()
    {
        $validated = $this->validateOnly('facebook', ['facebook' => ['required', 'url'],]);
        try {
            Setting::updateOrCreate(['id' => 1], ['facebook' => $validated['facebook']]);
            session()->flash('facebook', trans('alerts.profile.Updated'));
            $this->dispatch('resetSuccessMessage', field: 'facebook');
        } catch (Exception $e) {
            Log::error('[updatedFacebook]: ' . $e->getMessage());
            session()->flash('error', trans('alerts.profile.Failed'));
        }
    }

    public function updatedInstagram()
    {
        $validated = $this->validateOnly('instagram', ['instagram' => ['required', 'url'],]);
        try {
            Setting::updateOrCreate(['id' => 1], ['instagram' => $validated['instagram']]);
            session()->flash('instagram', trans('alerts.profile.Updated'));
            $this->dispatch('resetSuccessMessage', field: 'instagram');
        } catch (Exception $e) {
            Log::error('[updatedInstagram]: ' . $e->getMessage());
            session()->flash('error', trans('alerts.profile.Failed'));
        }
    }

    public function updatedTwitter()
    {
        $validated = $this->validateOnly('twitter', ['twitter' => ['required', 'url'],]);
        try {
            Setting::updateOrCreate(['id' => 1], ['twitter' => $validated['twitter']]);
            session()->flash('twitter', trans('alerts.profile.Updated'));
            $this->dispatch('resetSuccessMessage', field: 'twitter');
        } catch (Exception $e) {
            Log::error('[updatedTwitter]: ' . $e->getMessage());
            session()->flash('error', trans('alerts.profile.Failed'));
        }
    }

    public function updatedYoutube()
    {
        $validated = $this->validateOnly('youtube', ['youtube' => ['required', 'url'],]);
        try {
            Setting::updateOrCreate(['id' => 1], ['youtube' => $validated['youtube']]);
            session()->flash('youtube', trans('alerts.profile.Updated'));
            $this->dispatch('resetSuccessMessage', field: 'youtube');
        } catch (Exception $e) {
            Log::error('[updatedYoutube]: ' . $e->getMessage());
            session()->flash('error', trans('alerts.profile.Failed'));
        }
    }

    public function resetSuccessMessage($field)
    {
        $this->resetErrorBag($field);
    }

    public function mount()
    {
        $this->name = Setting::getValue('name');
        $this->description = Setting::getValue('description');
        $this->keywords = Setting::getValue('keywords');
        $this->language = Setting::getValue('language');
        $this->email = Setting::getValue('email');
        $this->phone = Setting::getValue('phone');
        $this->address = Setting::getValue('address');
        $this->existingFavicon = Setting::getValue('favicon');
        $this->existingLogoLight = Setting::getValue('logo_light');
        $this->existingLogoDark = Setting::getValue('logo_dark');
        $this->facebook = Setting::getValue('facebook');
        $this->instagram = Setting::getValue('instagram');
        $this->twitter = Setting::getValue('twitter');
        $this->youtube = Setting::getValue('youtube');
    }

    public function render()
    {
        return view('admin.pages.settings')->extends('layouts.dashboard')->section('content');
    }
}
