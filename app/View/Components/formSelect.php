<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class formSelect extends Component
{
    public $name;
    public $id;
    public $label;
    public $placeholder;
    public $options;

    public function __construct($name, $id, $label, $placeholder, $options)
    {
        $this->name = $name;
        $this->id = $id;
        $this->label = $label;
        $this->placeholder = $placeholder;
        $this->options = $options;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.form-select');
    }
}
