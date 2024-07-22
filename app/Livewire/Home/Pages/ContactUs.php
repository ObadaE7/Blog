<?php

namespace App\Livewire\Home\Pages;

use App\Models\Contact;
use Exception;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class ContactUs extends Component
{
    public $name;
    public $email;
    public $message;

    public function submit()
    {
        $validated = $this->validate([
            'name' => 'required|string|max:25',
            'email' => 'required|email',
            'message' => 'required|string|max:500',
        ]);

        try {
            Contact::create($validated);
            session()->flash('success', trans('alerts.contact.Created'));
            $this->reset();
        } catch (Exception $e) {
            Log::error('[contactUsSubmit] ' . $e->getMessage());
            session()->flash('error', trans('alerts.contact.Failed create'));
        }
    }

    public function render()
    {
        return view('pages.home.pages.contact-us')
            ->layout('layouts.guest')
            ->title(trans('index.title.Contact us'));
    }
}
