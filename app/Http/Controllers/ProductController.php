<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function productDetail($id){
        $product = Product::find($id);

        return view('product.detail', compact('product'));
    }
}
