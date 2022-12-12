<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        return view('admin.home.index');
    }

    public function listUser(Request $request){
        $listUser = User::all();

        return view('admin.user.list', compact('listUser'));
    }

    public function detailUser($id){
         $user = User::find($id);
         return view('admin.user.detail', compact('user'));
    }

}
