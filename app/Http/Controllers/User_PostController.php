<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class User_PostController extends Controller
{
    public function index(post $post){
        return view("post/posts")->with(['posts'=>$post->get()]);
        //バックエンド側のテーブルを参照したいときは$post->get()
    }

    public function show(Posts $post){
        return view('post/posts')->with(['posts'=>$post]);
        
    }
}
