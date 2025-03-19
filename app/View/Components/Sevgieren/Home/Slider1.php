<?php

namespace App\View\Components\Sevgieren\Home;

use Illuminate\View\Component;

class Slider1 extends Component
{
    public ?array $sliders = null;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(?array $data = [])
    {
        $this->sliders = $data;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $data = $this->sliders;
        return view('components.sevgieren.home.slider1', compact('data'));
    }
}
