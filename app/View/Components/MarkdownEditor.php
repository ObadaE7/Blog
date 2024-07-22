<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class MarkdownEditor extends Component
{
    public $id;
    public $name;
    public $placeholder;

    /**
     * Create a new component instance.
     */
    public function __construct($name, $id, $placeholder)
    {
        $this->name = $name;
        $this->id = $id;
        $this->placeholder = $placeholder;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.markdown-editor');
    }
}
