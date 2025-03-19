<?php

namespace App\Http\Controllers;

use App\Models\Product;

class ProductController extends Controller
{
    public function index(?string $slug = '') {
        abort_if(empty($slug), 404);
        $product = Product::where(['slug' => $slug])->firstOrFail();
        $GLOBALS['_seo'] = $product->seo;
        return view('shop.single-product', ['product' => $product]);
    }

    public function category(){
        return 'category detayları';
    }
}
