<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class penguin_textarea extends Component
{
    /**
     * Create a new component instance.
     */
    public string $id;
    public string $name;
    public string $title;
    public string $placeholder;

    public function __construct(string $id, string $name, string $title, $placeholder)
    {
        $this->id = $id;
        $this->name = $name;
        $this->title = $title;
        $this->placeholder = $placeholder;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.penguin_textarea');
    }
}
