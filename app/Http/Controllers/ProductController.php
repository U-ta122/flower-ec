<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Cloudinary;

class ProductController extends Controller
{
    public function create(){
        return view("products.create");
    }

    public function store(Request $request, Product $product){
        //$product=new Product;＝Product $product
        $input = $request['product'];
        $image_url = Cloudinary::upload($request->file('image')->getRealPath())->getSecurePath();
        $input['shop_id']=auth()->user()->id;
        $input += ['image_url' => $image_url];
        $product->fill($input)->save();
        
        return redirect('/shop/products/' . $product->id);
    }

    public function show(Product $product){
        return view('products/product')-> with(['product'=> $product]);
    }

    // public function index(){
    //     return view("products.create");
    // }
}
