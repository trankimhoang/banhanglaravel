<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $listProduct = Product::all();

        return view("home", compact("listProduct"));
    }
}
