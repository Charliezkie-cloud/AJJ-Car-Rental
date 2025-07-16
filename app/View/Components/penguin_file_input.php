<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class penguin_file_input extends Component
{
    /**
     * Create a new component instance.
     */

    public string $id;
    public string $name;
    public string $title;
    public string $validFiles;
    public string $accept;
    public bool $multiple;

    public function __construct(string $id, string $name, string $title, string $validFiles, string $accept, bool $multiple)
    {
        $this->id = $id;
        $this->name = $name;
        $this->title = $title;
        $this->validFiles = $validFiles;
        $this->accept = $accept;
        $this->multiple = $multiple;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.penguin_file_input');
    }
}
