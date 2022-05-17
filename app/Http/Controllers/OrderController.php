<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\order;
use App\Http\Requests\StoreorderRequest;
use App\Http\Requests\UpdateorderRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        $data = Post::with('category')->latest()->paginate(5);
//        return view('posts.index',['data'=>$data]);

        $orders = order::all();
//       return $orders->pluck("user_id");
        return view("order.index", compact("orders"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $userId = Auth::user()->id;
        $total = $products = DB::table('carts')
            ->join('posts', 'carts.post_id', '=', 'posts.id')
            ->where('carts.user_id', $userId)
            ->sum('posts.sale_price');
//        return $total;
        return view('order.create', ['total' => $total]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\StoreorderRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreorderRequest $request)
    {
//        return $request;
        $request->validate([

            'address' => 'required|min:9|max:100',
            'phone' => 'required|min:9|max:11',
            "payment" => "required",

        ]);

        $userId = Auth::user()->id;
        $allCart = Cart::where('user_id', $userId)->get();
        foreach ($allCart as $cart) {
            $order = new Order();
            $order->post_id = $cart['post_id'];
            $order->user_id = $cart['user_id'];
            $order->status = "Pending";
            $order->phone = $request->phone;
            $order->address = $request->address;
            $order->payment_method = $request->payment;
            $order->amount = $request->total;
            $order->save();
            Cart::where('user_id', $userId)->delete();
        }
//        return $request;
        $request->input();
        return redirect()->route('order.index')->with("status","You have just been submitted orders");
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\order $order
     * @return \Illuminate\Http\Response
     */
    public function show(order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\order $order
     * @return \Illuminate\Http\Response
     */
    public function edit(order $order)
    {
//        return $order;
        return view("order.edit", compact("order"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\UpdateorderRequest $request
     * @param \App\Models\order $order
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateorderRequest $request, order $order)
    {
        $request->validate([
            "post_id" => "required",
            "user_id" => "required",
            "status" => "required",
            "phone" => "required",
            "address" => "required",
            "payment_method" => "required",
            "amount" => "required",
            "updated_at" => "required",
        ]);
            $order->post_id = $request->post_id;
            $order->user_id = $request->user_id;
            $order->status = $request->status;
            $order->phone = $request->phone;
            $order->address = $request->address;
            $order->payment_method = $request->payment_method;
            $order->amount = $request->amount;
            $order->updated_at = $request->updated_at;
            $order->update();
            return redirect()->route("order.index")->with("status","Your data updated");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\order $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(order $order)
    {
        $order->delete();
        return redirect()->route("order.index")->with("status","Your data updated");
    }


}
