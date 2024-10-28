<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class GoodsController extends Controller{
    public function create (Product $product){
        $data=$product->get();
        return view('products/index')->with(["products"=>$data]);
    }

    public function show (Product $product){
        return view('products/detail')->with(['product'=>$product]);//手前の''内がkey（変数名でbladeファイル内で使う方）
    }
    
}

    