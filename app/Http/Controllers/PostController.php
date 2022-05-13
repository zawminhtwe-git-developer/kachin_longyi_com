<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Post;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use Clockwork\Request\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function __construct()
    {
        return $this->middleware("isAdmin")->only(["create","edit","store","delete","üpdate"]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $data = Post::all();
//     return collect($data)->max("price");
//        return collect($data)->average("price");
        $data = Post::with('category')->latest()->paginate(5);
        return view('posts.index',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('posts.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePostRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostRequest $request)
    {

//        return $request;
//        $request->validate([
//            "category_id" => "required",
//            'name' => 'required|min:9|max:50',
//            'price' => 'required',
//            "description" => "required",
//            "balance" => "required",
//            "gallery" => "required|mimetypes:image/jpeg,image/png|max:1024"
//        ]);

        $products = new Post();
        $products->category_id = $request->category_id;
        $products->name = $request->name;
        $products->price = $request->price;
        $products->description = $request->description;
        $products->balance = $request->balance;

        $dir = "public/product_photo"; //သိမ်းမည့်လမ်းကြောင်း ၃
        $file = $request->file("gallery"); // ဘေအေဘယ် တစ်ခုအနေနဲ့အရင်သိမ်းလိုက်တယ် ၁
        $newName = uniqid()."_"."product_photo.".$file->getClientOriginalExtension();//ဖိုင်နာမည်ပြောင်းတယ် ပြီးတော့ extension ယူ ၂
        $request->file("gallery")->storeAs($dir, $newName);//ဖိုင်သိမ်းတဲ့အဆင့်ပါ ၄
        $products->gallery = $newName;

        $products->save();

        return redirect()->back()->with("status", ['icon'=>'success','title'=>'Your Data Have Filled']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {

        return view('posts.edit',compact('post'))->with('status',"You get it for Edit");
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePostRequest  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        $request->validate([
            'name' => 'required|min:9|max:50',
            'price' => 'required',
            "category_id" => "required",
            "description" => "required",
            "balance" => "required",
            "gallery" => "sometimes|mimetypes:image/jpeg,image/png|max:1024"
        ]);
        if($request->hasFile('gallery')){
            $dir   = "public/product_photo";
            Storage::delete($dir."/".$post->gallery);

            $file=$request->file("gallery"); // ဘေအေဘယ် တစ်ခုအနေနဲ့အရင်သိမ်းလိုက်တယ် ၁
            $newName=uniqid()."_"."product_gallery.".$file->getClientOriginalExtension();//ဖိုင်နာမည်ပြောင်းတယ် ပြီးတော့ extension ယူ ၂
            $request->file("gallery")->storeAs($dir,$newName);//ဖိုင်သိမ်းတဲ့အဆင့်ပါ ၄
            $post->gallery = $newName;
        }

        $post->name = $request->name;
        $post->price = $request->price;
        $post->category_id = $request->category_id;
        $post->description = $request->description;
        $post->balance = $request->balance;



//        $dir = "public/product_photo"; //သိမ်းမည့်လမ်းကြောင်း ၃
//        $file = $request->file("gallery"); // ဘေအေဘယ် တစ်ခုအနေနဲ့အရင်သိမ်းလိုက်တယ် ၁
//        $newName = uniqid()."_"."product_photo.".$file->getClientOriginalExtension();//ဖိုင်နာမည်ပြောင်းတယ် ပြီးတော့ extension ယူ ၂
//        $request->file("gallery")->storeAs($dir, $newName);//ဖိုင်သိမ်းတဲ့အဆင့်ပါ ၄
//        $posts->gallery = $newName;

        $post->update();

        return redirect()->route('post.index')->with('status', ['icon'=>'success','title'=>'Your File Updated']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $product=Post::find($post->id);
        $img_path = "storage/product_photo/".$product->gallery;
        unlink($img_path);
        $product->delete();
        return redirect()->back()->with("status",['icon'=>'success','title'=>'Your data Deleted']);
    }








}
