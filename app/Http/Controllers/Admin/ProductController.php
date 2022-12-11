<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ProductController extends Controller
{
    public function index(){
        $listProduct = Product::paginate(2);

        return view('admin.product.index', compact('listProduct'));
    }

    public function addProduct(Request $request){
        return view('admin.product.add');
    }

    public function addProductPost(Request $request){
        try {
            $product = new Product();
            $product->setAttribute('name', $request->get('name'));
            $product->setAttribute('image', '');
            $product->setAttribute('price', $request->get('price'));
            $product->setAttribute('description', $request->get('description'));
            $product->save();

            if ($request->has('image')) {
                $imagePath = 'product_images/' . $product->getAttribute('id');
                $imageUrl = updateImage($request->file('image'), 'avatar', $imagePath);
                $product->setAttribute('image', $imageUrl);
                $product->save();
            }

            return redirect()->route('admin.product.index')->with('success', 'Them thanh cong');
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            return redirect()->back()->with('error', $exception->getMessage());
        }
    }

    public function deleteProduct($id) {
        try {
            $product = Product::find($id);
            $product->delete();

            return redirect()->route('admin.product.index')->with('success', 'xoa thanh cong');
        }catch (\Exception $exception){
            Log::error($exception->getMessage());
            return redirect()->back()->with('error', $exception->getMessage());
        }
    }

    public function editProduct($id){
        $product = Product::find($id);
        return view('admin.product.edit', compact('product'));
    }

    public function editProductPost(Request $request){
        try {
            $product = Product::find($request->get('id'));
            $product->setAttribute('name', $request->get('name'));

            if ($request->has('image')) {
                $imagePath = 'product_images/' . $product->getAttribute('id');
                $imageUrl = updateImage($request->file('image'), 'avatar', $imagePath);
                $product->setAttribute('image', $imageUrl);
            }

            $product->setAttribute('price', $request->get('price'));
            $product->setAttribute('description', $request->get('description'));
            $product->save();

            return redirect()->route('admin.product.index')->with('success', 'Sua thanh cong product ' . $product->id);
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            return redirect()->back()->with('error', $exception->getMessage());
        }
    }
}
