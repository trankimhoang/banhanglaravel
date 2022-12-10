<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $listProduct = Product::all();

        return view("home", compact("listProduct"));
    }

    public function listUser(){
        $listUser = User::all();

        return view('list_user', compact("listUser"));
    }
}
