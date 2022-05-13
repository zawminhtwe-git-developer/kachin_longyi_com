<?php

namespace App\Http\Controllers;

use App\Models\order;
use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

//ပိုစ်ဆိုတဲ့ တေဘယ်ထဲကနေ အိုင်ဒီနဲ့ ဖန်တီးတဲ့ ရက်ကို ယူပြီးတော့ မေလအတွင်းမှာ တင်ခဲ့တဲံဟာကိုယူတယ်
        $data = Post::select('id','created_at')->get()->groupBy(function ($data){
         return Carbon::parse($data->created_at)->format('M');
        });
//{"May":
//[{"id":1,"created_at":"2022-05-11T13:53:40.000000Z"},
//{"id":2,"created_at":"2022-05-11T16:39:51.000000Z"},
//{"id":3,"created_at":"2022-05-11T13:53:40.000000Z"},
//{"id":4,"created_at":"2022-05-11T16:39:51.000000Z"}]}


        $months = [];
        $monthCount=[];

        foreach($data as $month => $values){
            $months[] = $month;
            $monthCount[] = count($values);
        }

        $order = order::select('id','created_at')->get()->groupBy(function ($order){
            return Carbon::parse($order->created_at)->format('D');
        });
        $days =[];
        $dayCount=[];
        foreach($order as $day => $values){
            $days[] = $day;
            $dayCount[] = count($values);
        }
        return view('home',compact(["data","months","monthCount","order","days","dayCount"]));
    }
}
