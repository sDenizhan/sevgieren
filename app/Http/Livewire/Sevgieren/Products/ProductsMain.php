<?php

namespace App\Http\Livewire\Sevgieren\Products;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class ProductsMain extends Component
{
    use WithPagination;

    public ?string $order = 'asc';
    public ?array $params = [];

    protected $listeners = ['filter'];

    public function filter($params){
        $this->params = $params;
    }

    public function render() {
        return view('livewire.sevgieren.products.products-main', [
            'products' => Product::with('category')
                            ->when(!empty($this->params['search']), function($query){
                                return $query->where('title', 'like', '%'. $this->params['search'] .'%');
                            })
                            ->when(!empty($this->params['categoryId']), function ($query){
                                return $query->where('category_id', $this->params['categoryId']);
                            })
                            ->when(!empty($this->params['minPrice']), function ($query){
                                return $query->where('price', '>=', $this->params['minPrice']);
                            })
                            ->when(!empty($this->params['maxPrice']), function ($query){
                                return $query->where('price', '<=', $this->params['maxPrice']);
                            })
                            ->orderBy('price', $this->order)
                            ->paginate(24)
        ]);
    }

    public function paginationView(){
        return 'shop.pagination';
    }
}
