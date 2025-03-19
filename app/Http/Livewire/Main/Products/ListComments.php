<?php

namespace App\Http\Livewire\Main\Products;

use App\Enums\Status;
use App\Models\ProductComments;
use Livewire\Component;
use Livewire\WithPagination;

class ListComments extends Component
{
    use WithPagination;

    public ?string $title = '';
    public ?int $product_id = 0;

    public function render() {
        return view('livewire.main.products.list-comments', [
            'comments' => ProductComments::with('product')
                                            ->where(['status' => Status::Active->value])
                                            ->paginate(25)
        ]);
    }

    public function paginationView(){
        return 'shop.pagination';
    }
}
