<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function categoryDetail($id){
        $category = Category::find($id);

        return view('category.detail', compact('category'));
    }
}
