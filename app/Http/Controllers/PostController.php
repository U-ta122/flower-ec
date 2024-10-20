<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function create(){
        return view('post.create');
    }
    //{};<-関数の定義文やfor文には;はつかない

    public function store(Request $request, Post $post){
        // dd($request);
        $input = $request['post'];
        $input['shop_id']=auth()->user()->id;
        $post->fill($input)->save();

        return redirect('/shop/post/create');
    }
}
