<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index(){
        $listProduct = Product::all();

        return view("home", ['listProduct' => $listProduct]);
    }

    public function listUser(){
        $listUser = User::all();

        return view('list_user', compact("listUser"));
    }

    public function search(Request $request){
        $search = $request->get('search');
        $listProduct = Product::where('name', 'like', '%' . $search . '%')->get();

        return view('search', compact('search', 'listProduct'));
    }

    public function addCart(Request $request){
        $productId = $request->get('product_id');
        $userId = Auth::guard('web')->user()->id;
        $quality = $request->get('quality') ?? 1;

        if ($quality < 1){
            return redirect()->back()->with('error', 'So luong khong hop le');
        }


        $cartRow = DB::table('carts')
            ->where('user_id', $userId)
            ->where('product_id', $productId)
            ->get()->first();

        if (!empty($cartRow->id)){
            $cart = Cart::find($cartRow->id);
            $cart->setAttribute('quality', $cart->getAttribute('quality') + $quality);
            $cart->save();
        } else {
            $cart = new Cart();
            $cart->setAttribute('product_id', $productId);
            $cart->setAttribute('user_id', $userId);
            $cart->setAttribute('quality', $quality);
            $cart->save();
        }

        return redirect()->back()->with('success', 'Them vao gio hang thanh cong');
    }

    public function cartDetail(Request $request){
        return view('cart.index');
    }
}
