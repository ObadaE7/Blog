<?php

namespace App\Livewire\Home\Pages;

use Livewire\Component;

class AboutUs extends Component
{
    public function render()
    {
        return view('pages.home.pages.about-us')
            ->layout('layouts.guest')
            ->title(trans('index.title.About us'));
    }
}
