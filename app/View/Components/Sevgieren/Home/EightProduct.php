<?php

namespace App\View\Components\Sevgieren\Home;

use Illuminate\View\Component;

class EightProduct extends Component
{
    public ?array $params = null;
    public function __construct(?array $data  = [])
    {
        $this->params = $data;
    }

    public function render()
    {
        $data = $this->params;
        return view('components.sevgieren.home.eightproduct', compact('data'));
    }
}
