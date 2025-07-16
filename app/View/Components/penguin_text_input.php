<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class penguin_text_input extends Component
{
    /**
     * Create a new component instance.
     */

    public string $id;
    public string $name;
    public string $title;
    public string $placeholder;
    public string $value;

    public function __construct(string $id, string $name, string $title, string $placeholder, string $value)
    {
        $this->id = $id;
        $this->name = $name;
        $this->title = $title;
        $this->placeholder = $placeholder;
        $this->value = $value;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.penguin_text_input');
    }
}
