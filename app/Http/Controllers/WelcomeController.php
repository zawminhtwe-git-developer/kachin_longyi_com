<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Share;

class WelcomeController extends Controller
{
    public static function detail($id){

        $sharePage = Share::page(request()->url(),'Kachinlongyi.com Website သည် Customers များကို (၁၀၀%) ဝန်ဆောင်မှုပေးသော Online Shopping တစ်ခုဖြစ်ပါသည်။ Kachinlongyi.com မှ ဝယ်ယူသော ပစ္စည်းများကို သက်ဆိုင်ရာ မြို့နယ်အသီးသီးသို့ စာတိုက်မှလည်းကောင်း၊ ကားဂိတ်မှလည်းကောင်း ပို့ဆောင်ပေးလျက် ရှိနေပြီဖြစ်ပါသည်။ Kachinlongyi.com မှဝယ်ယူသော ပစ္စည်းများကို ငွေပေးချေရာတွင် KBZ Pay၊ Wave Money Pay၊ Myanmar Economic Bank တို့မှလည်း ပေးချေနိုင်ပြီဖြစ်ပါသည်။')
            ->facebook()
            ->twitter()
            ->linkedin()
            ->whatsapp()
            ->telegram()
            ->pinterest()->getRawLinks();

        $data = Post::find($id);
//        return $data->postGalleries;
        return view('blog-layouts.detail',['product'=>$data,"sharePage"=>$sharePage]);
    }
    public function search(Request $req){
        $data= Post::where('name','like','%'.$req->input('input').'%')
            ->get();
        return view('blog-layouts.search',['products'=>$data]);
    }




}
