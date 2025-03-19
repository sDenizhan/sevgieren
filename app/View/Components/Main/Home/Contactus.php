<?php

namespace App\View\Components\Main\Home;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Contactus extends Component
{
    public ?array $params = [];

    public function __construct(?array $data = []) {
        $this->params = $data;
    }

    public function render(): View {
        $data = $this->params;
        return view('components.main.home.contactus', compact('data'));
    }
}
