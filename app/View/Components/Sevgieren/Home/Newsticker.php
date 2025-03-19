<?php

namespace App\View\Components\Sevgieren\Home;

use Illuminate\View\Component;

class Newsticker extends Component
{
    public ?array $params = [];
    /**
     * Create a new component instance.
     *
     * @return void
     */
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
        return view('components.sevgieren.home.newsticker', compact('data'));
    }
}
