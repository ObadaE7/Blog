<?php

namespace App\Livewire\Home;

use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        return view('pages.home.index')
            ->layout('layouts.guest')
            ->title(trans('index.title.Homepage'));
    }
}
