<?php

namespace App\Http\Livewire\Sevgieren\Products\Filters;

use App\Models\Product;
use App\Models\ProductCategory;
use Livewire\Component;

class Sidebar extends Component
{
    public ?string $search = '';
    public ?string $categoryId = '';
    public ?string $minPrice = '0';
    public ?string $maxPrice = '9999999999999999999999';

    public function mount(){
        $this->categories = ProductCategory::all();
        $this->randomProducts = Product::inRandomOrder()->take(5)->get();
    }

    public function submit(){
        $this->emit('filter', [
            'search' => $this->search,
            'categoryId' => $this->categoryId,
            'minPrice' => $this->minPrice,
            'maxPrice' => $this->maxPrice
        ]);
    }

    public function resetFilter(){
        $this->categoryId = '';
        $this->search = '';
        $this->minPrice = '0';
        $this->maxPrice = '9999999999999999999999';
        $this->emit('filter', []);
    }

    public function render()
    {
        return view('livewire.sevgieren.products.filters.sidebar');
    }
}
