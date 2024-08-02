<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class formInput extends Component
{
    public $type;
    public $name;
    public $id;
    public $label;
    public $placeholder;

    public function __construct($type, $name, $id, $label, $placeholder)
    {
        $this->type = $type;
        $this->name = $name;
        $this->id = $id;
        $this->label = $label;
        $this->placeholder = $placeholder;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.form-input');
    }
}
