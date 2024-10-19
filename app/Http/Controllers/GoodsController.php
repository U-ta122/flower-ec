<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class GoodsController extends Controller{
    public function show (Product $product){
        $data=$product->get();
        return view('products/index')->with(["products"=>$data]);
    }

    
}

    