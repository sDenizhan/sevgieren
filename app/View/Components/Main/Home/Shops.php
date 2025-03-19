<?php

namespace App\View\Components\Main\Home;

use App\Enums\Status;
use App\Models\Product;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Shops extends Component
{
    public ?array $params = [];

    public function __construct(?array $data = []){
        $this->params = $data;
    }

    public function render(): View {
        $data = $this->params;
        $products = Product::with('category')
                    ->when($data['type'] == 1, function ($query){
                        return $query->orderBy('created_at', 'asc');
                    })
                    ->when($data['type'] == 2, function ($query){
                        return $query->orderBy('price', 'asc');
                    })
                    ->when($data['category_id'] != 0, function($query) use ($data) {
                        return $query->where(['category_id' => $data['category_id']]);
                    })
                    ->take($data['count'])
                    ->get();
        return view('components.main.home.shops', compact('data', 'products'));
    }
}
