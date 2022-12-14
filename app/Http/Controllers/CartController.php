<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
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

        return response()->json([
            'success'=>true,
            'data'=>[
                'message'=>'Them vao gio hang thanh cong',
                'qty' => \Illuminate\Support\Facades\Auth::guard('web')->user()->Carts->sum('quality'),
                'cart_dropdown' => view('cart.cart_dropdown')->render()
            ]
        ]);
    }

    public function cartDetail(Request $request){
        return view('cart.list');
    }

    public function deleteItemCart(Request $request){
        $id = $request->get('id');

        $cart = Cart::find($id);
        $cart->delete();

        return response()->json([
            'success' => true,
            'data' => [
                'qty' => \Illuminate\Support\Facades\Auth::guard('web')->user()->Carts->sum('quality'),
                'cart_dropdown' => view('cart.cart_dropdown')->render()
            ]
        ]);
    }
}
