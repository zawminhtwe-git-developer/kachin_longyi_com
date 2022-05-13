<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function detail($id){
        $data = Post::find($id);
//        return $data->postGalleries;
        return view('blog-layouts.detail',['product'=>$data]);
    }
    public function search(Request $req){
        $data= Post::where('name','like','%'.$req->input('input').'%')
            ->get();
        return view('blog-layouts.search',['products'=>$data]);
    }




}
