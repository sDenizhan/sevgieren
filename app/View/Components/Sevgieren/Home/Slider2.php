<?php

namespace App\View\Components\Sevgieren\Home;

use Illuminate\View\Component;

class Slider2 extends Component
{
    public $params;

    public function __construct(?array $data = [])
    {
        $this->params = $data;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $data = $this->params;
        return view('components.sevgieren.home.slider2', compact('data'));
    }
}
