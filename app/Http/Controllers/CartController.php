<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Http\Requests\StoreCartRequest;
use App\Http\Requests\UpdateCartRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userId = Auth::user()->id;
        $carts = DB::table('carts')
            ->join('posts','carts.post_id','=','posts.id')
            ->where('carts.user_id',$userId)
            ->select('posts.*','carts.id as cart_id')
            ->get();
//        return $carts;
        return view ('cart.index',['carts'=>$carts]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCartRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCartRequest $request)
    {
//        return $request;
        if(Auth::user()){
            $cart = new Cart();
            $cart->user_id = Auth::user()->id;
            $cart->post_id = $request->post_id;
            $cart->save();
            return redirect()->back();

        }else{
            return redirect('/login');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function show(Cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCartRequest  $request
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCartRequest $request, Cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cart $cart)
    {
//        return dd($cart);
        $cart->delete();
        return redirect()->back();
    }


    //count
    public static function cartItem(){
      if(Auth::user()){
          $userId = Auth::user()->id;
          return Cart::where('user_id',$userId)->count();
      }
    }



}
