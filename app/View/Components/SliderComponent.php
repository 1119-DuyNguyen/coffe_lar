<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SliderComponent extends Component
{
    public $sliders;
    /**
     * Create a new component instance.
     */
    public function __construct($sliders)
    {
        //
        $this->sliders=$sliders;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.slider-component');
    }
}
