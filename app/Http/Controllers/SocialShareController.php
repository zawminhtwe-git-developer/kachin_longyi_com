<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Share;

/**
 * https://github.com/jorenvh/laravel-share
 * php artisan make:controller SocialShareController
 * composer require jorenvanhocht/laravel-share
 * // config/app.php
'providers' => [
Jorenvh\Share\Providers\ShareServiceProvider::class,
];
 * // config/app.php
'aliases' => [
'Share' => Jorenvh\Share\ShareFacade::class,
];
 * php artisan vendor:publish --provider="Jorenvh\Share\Providers\ShareServiceProvider"
 * <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha256-4+XzXVhsDmqanXGHaHvgh1gMQKX40OUvDEBTu8JcmNs=" crossorigin="anonymous"></script>
<script src="{{ asset('js/share.js') }}"></script>
 *
 * Share::page('http://jorenvanhocht.be', 'Share title')
->facebook()
->twitter()
->linkedin('Extra linkedin summary can be passed here')
->whatsapp();
 *
 *
 * Class SocialShareController
 * @package App\Http\Controllers**/

class SocialShareController extends Controller
{
    public static function index(Request $request){

        $sharePage = Share::page(request()->url(),'Kachinlongyi.com Website သည် Customers များကို (၁၀၀%) ဝန်ဆောင်မှုပေးသော Online Shopping တစ်ခုဖြစ်ပါသည်။ Kachinlongyi.com မှ ဝယ်ယူသော ပစ္စည်းများကို သက်ဆိုင်ရာ မြို့နယ်အသီးသီးသို့ စာတိုက်မှလည်းကောင်း၊ ကားဂိတ်မှလည်းကောင်း ပို့ဆောင်ပေးလျက် ရှိနေပြီဖြစ်ပါသည်။ Kachinlongyi.com မှဝယ်ယူသော ပစ္စည်းများကို ငွေပေးချေရာတွင် KBZ Pay၊ Wave Money Pay၊ Myanmar Economic Bank တို့မှလည်း ပေးချေနိုင်ပြီဖြစ်ပါသည်။')
            ->facebook()
            ->twitter()
            ->linkedin()
            ->whatsapp()
            ->telegram()
            ->pinterest()->getRawLinks();
        return $sharePage;
//              return view("social-share",compact("sharePage"));



    }
}
