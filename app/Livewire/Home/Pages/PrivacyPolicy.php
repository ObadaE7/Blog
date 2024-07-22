<?php

namespace App\Livewire\Home\Pages;

use Livewire\Component;

class PrivacyPolicy extends Component
{
    public function render()
    {
        return view('pages.home.pages.privacy-policy')
            ->layout('layouts.guest')
            ->title(trans('index.title.Privacy and policy'));
    }
}
