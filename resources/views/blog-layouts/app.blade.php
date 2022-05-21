
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Primary Meta Tags -->
    <title>Sein Sein Kachin Longyi</title>
    <meta name="title" content="Sein Sein Kachin Longyi">
    <meta name="description"
          content="'Sein Sein' Kachinlongyi.com Website သည် Customers များကို (၁၀၀%) ဝန်ဆောင်မှုပေးသော Online Shopping တစ်ခုဖြစ်ပါသည်။ Kachinlongyi.com မှ ဝယ်ယူသော ပစ္စည်းများကို သက်ဆိုင်ရာ မြို့နယ်အသီးသီးသို့ စာတိုက်မှလည်းကောင်း၊ ကားဂိတ်မှလည်းကောင်း ပို့ဆောင်ပေးလျက် ရှိနေပြီဖြစ်ပါသည်။ Kachinlongyi.com မှဝယ်ယူသော ပစ္စည်းများကို ငွေပေးချေရာတွင် KBZ Pay၊ Wave Money Pay၊ Myanmar Economic Bank တို့မှလည်း ပေးချေနိုင်ပြီဖြစ်ပါသည်။">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{env('APP_URL')}}">
    <meta property="og:title" content="Sein Sein Kachin Longyi">
    <meta property="og:description"
          content="'Sein Sein' Kachinlongyi.com Website သည် Customers များကို (၁၀၀%) ဝန်ဆောင်မှုပေးသော Online Shopping တစ်ခုဖြစ်ပါသည်။ Kachinlongyi.com မှ ဝယ်ယူသော ပစ္စည်းများကို သက်ဆိုင်ရာ မြို့နယ်အသီးသီးသို့ စာတိုက်မှလည်းကောင်း၊ ကားဂိတ်မှလည်းကောင်း ပို့ဆောင်ပေးလျက် ရှိနေပြီဖြစ်ပါသည်။ Kachinlongyi.com မှဝယ်ယူသော ပစ္စည်းများကို ငွေပေးချေရာတွင် KBZ Pay၊ Wave Money Pay၊ Myanmar Economic Bank တို့မှလည်း ပေးချေနိုင်ပြီဖြစ်ပါသည်။">
    <meta property="og:image" content="{{asset('images/logo/profile real.jpg') }}">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="{{env('APP_URL')}}">
    <meta property="twitter:title" content="Sein Sein Kachin Longyi">
    <meta property="twitter:description"
          content="'Sein Sein' Kachinlongyi.com Website သည် Customers များကို (၁၀၀%) ဝန်ဆောင်မှုပေးသော Online Shopping တစ်ခုဖြစ်ပါသည်။ Kachinlongyi.com မှ ဝယ်ယူသော ပစ္စည်းများကို သက်ဆိုင်ရာ မြို့နယ်အသီးသီးသို့ စာတိုက်မှလည်းကောင်း၊ ကားဂိတ်မှလည်းကောင်း ပို့ဆောင်ပေးလျက် ရှိနေပြီဖြစ်ပါသည်။ Kachinlongyi.com မှဝယ်ယူသော ပစ္စည်းများကို ငွေပေးချေရာတွင် KBZ Pay၊ Wave Money Pay၊ Myanmar Economic Bank တို့မှလည်း ပေးချေနိုင်ပြီဖြစ်ပါသည်။">
    <meta property="twitter:image" content="{{asset('images/logo/profile real.jpg') }}">

    <link rel="icon" href="{{ asset('images/logo/profile real.jpg') }}">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>{{config('app.name','Laravel')}}</title>


    <style>
        /*welcome css start*/
        @import url('https://fonts.googleapis.com/css2?family=Source+Serif+4:wght@200;400;600;900&display=swap');
        :root {
            --body-color: #b700bc;
            --nav-color: #ed35ef;
            --nav-color-dark: #b700bc;
            --side-nav: #535353;
            --text-color: #fff;
            --search-bar: #f2f2f2;
            --search-text: #010718;
        }

        * {
            font-family: 'Source Serif 4', sans-serif;
            margin: 0;
            padding: 0;
        / / box-shadow: border-box;
        }

        body {
            height: 100vh;
            background-color: var(--body-color);
            {{--background-image: url({{url('images/logo/profile real.jpg')}});--}}
   background-position: center; /* Center the image */
            background-repeat: no-repeat; /* Do not repeat the image */
            background-size: cover; /* Resize the background image to cover the entire container */
        }

        body.dark {
            --body-color: #18191a;
            --nav-color: #242526;
            --side-nav: #242526;
            --text-color: #ccc;
            --search-bar: #242526;
            --search-text: #010718;
        }

        nav {
            position: fixed;
            top: 0;
            left: 0;
            height: 70px;
            width: 100%;
            background-color: var(--nav-color);
            z-index: 100;
        }

        nav .nav-bar {
            position: relative;
            height: 100%;
            max-width: 1000px;
            width: 100%;
            background-color: var(--nav-color);
            margin: 0 auto;
            padding: 0 30px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        nav .nav-bar .sidebarOpen {
            color: var(--text-color);
            font-size: 25px;
            padding: 5px;
            cursor: pointer;
            display: none;
            margin-left: -26px;
        }

        nav .nav-bar .logo a {
            font-size: 25px;
            font-weight: 500;
            color: var(--text-color);
            text-decoration: none;
        }

        .nav-bar .nav-links {
            display: flex;
            align-items: center;
            margin-bottom: 0;
        }

        .nav-bar .nav-links li {
            margin: 0 5px;
            list-style: none;
        }

        .nav-links li a {
            position: relative;
            text-decoration: none;
            font-size: 17px;
            font-weight: 500;
            color: var(--text-color);
            padding: 5px;
        }

        .nav-links li a::before {
            content: "";
            position: absolute;
            left: 50%;
            bottom: 0;
            transform: translateX(50%);
            height: 6px;
            width: 6px;
            border-radius: 50%;
            background-color: var(--text-color);
            opacity: 0;
            transition: all 0.3s ease;
        }

        .nav-links li:hover a::before {
            opacity: 1;
        }

        .nav-links li a.nocolor::before {
            opacity: 0;
        }

        .nav-links li a.nocolor:hover::before {
            opacity: 1;
        }

        .nav-links li a.nocolor:hover {
            width: 88%;
            margin-left: 45px;
            justify-content: center;
            margin-right: 45px;
            transition: all 0.5s cubic-bezier(.6,-0.28,.74,.05);
        }

        .nav-bar .darkLight-searchBox {
            display: flex;
            align-items: center;

        }

        .darkLight-searchBox .dark-light,
        .darkLight-searchBox .searchToggle {
            height: 40px;
            width: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: var(--nav-color);
            margin: 0 5px;

        }

        .dark-light i,
        .searchToggle i {
            position: absolute;
            color: var(--text-color);
            font-size: 22px;
            cursor: pointer;
            transition: all 0.3s ease-in;
        }

        .dark-light i.sun {
            opacity: 0;
            pointer-events: none;
        }

        .dark-light.active i.sun {
            opacity: 1;
            pointer-events: auto;
        }

        .dark-light.active i.moon {
            opacity: 0;
            pointer-events: none;
        }

        .searchToggle i.cancel {
            opacity: 0;
            pointer-events: none;
        }

        .searchToggle.active i.cancel {
            opacity: 1;
            pointer-events: auto;
        }

        .searchToggle.active i.search {
            opacity: 0;
            pointer-events: none;
        }

        .searchBox {
            position: relative;
        }

        .searchBox .search-field {
            position: absolute;
            bottom: -85px;
            right: 5px;
            height: 50px;
            width: 300px;
            display: flex;
            align-items: center;
            background-color: var(--nav-color);
            padding: 3px;
            border-radius: 6px;
            box-shadow: 0 5px 5px rgba(0, 0, 0, 0.1);
            opacity: 0;
            pointer-events: none;
            transition: all 0.3s ease-in;
        }

        .searchToggle.active ~ .search-field {
            bottom: -74px;
            opacity: 1;
            pointer-events: auto;
        }


        .search-field::before {
            content: '';
            position: absolute;
            right: 14px;
            top: -4px;
            height: 12px;
            width: 12px;
            background-color: var(--nav-color);
            transform: rotate(-45deg);
            z-index: -1;
        }

        .search-field input {
            height: 100%;
            width: 100%;
            padding: 0 45px 0 15px;
            outline: none;
            border: none;
            border-radius: 4px;
            font-size: 14px;
            font-weight: 400;
            color: var(--search-text);
            background-color: var(--search-bar);

        }

        body.dark .search-field input {
            color: var(--text-color);
        }

        .search-field i {
            position: absolute;
            color: var(--nav-color);
            right: 15px;
            font-size: 22px;
            cursor: pointer;
        }

        .menu .logo-toggle {
            display: none;
        }

        body.dark .search-field i {
            color: var(--text-color);
        }

        .dropdown-content a {
            color: var(--nav-color);
        }
        .nav-img   {
            display: none;
        }

        @media (max-width: 790px) {
            nav .nav-bar .sidebarOpen {
                display: block;
            }

            .menu {
                position: fixed;
                height: 100%;
                width: 320px;
                left: -100%;
                top: 0;
                padding: 20px;
                background-color: var(--nav-color);
                z-index: 100;
                transition: all 0.4s ease;

            }

            nav.active .menu {
                left: -0%;
                transition: all 0.3s;
            }

            nav.active .nav-bar .navLogo a {
                opacity: 0;
                transition: all 0.3s ease-in;

            }

            .menu .logo-toggle {
                display: block;
                width: 100%;
                display: flex;
                align-items: center;
                justify-content: space-between;
            }

            .logo-toggle .sidebarClose {
                color: var(--text-color);
                font-size: 24px;
                cursor: pointer;
                border: white solid;
            }

            .nav-bar .nav-links {
                flex-direction: column;
                padding-top: 30px;
            }

            .nav-links li a {
                display: block;
                margin-top: 20px;
            }
            .nav-img   {
                display: block;
            }
        }

        /*//welcome css stop*/






        /*//drop down css start*/


        li a, .dropbtn {
            display: inline-block;
            color: white;
            text-align: center;
            /*padding: 14px 16px;*/
            text-decoration: none;
        }

        li a:hover, .dropdown:hover .dropbtn {
            background-color: var(--nav-color);
            border-radius: 10px;
            text-align: center;
        }

        li.dropdown {
            display: inline-block;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: var(--nav-color);
            min-width: 300px;
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
            z-index: 1;
        }

        .dropdown-content a {
            color: black;
            padding: 12px 12px;
            text-decoration: none;
            display: block;
            text-align: left;
        }
        .dropdown-content a:hover {
            background-color: var(--nav-color);
            border: 1px solid;
            padding: 10px;
            box-shadow: 5px 5px var(--body-color);
            width: 100%;

        }

        .dropdown:hover .dropdown-content {
            display: block;
        }

        /*//drop down css stop*/
        .hover {
            background-color: var(--body-color);
            border: 1px solid;
            padding: 10px;
            border-radius: 15px;
            box-shadow: 5px 3px var(--body-color);
        }

        /*cssbutton.io*/
        /* From cssbuttons.io by @alexroumi */
        button {
            padding: 15px 25px;
            border: unset;
            border-radius: 15px;
            color: #212121;
            z-index: 1;
            background: #e8e8e8;
            position: relative;
            font-weight: 1000;
            font-size: 17px;
            -webkit-box-shadow: 4px 8px 19px -3px rgba(0, 0, 0, 0.27);
            box-shadow: 4px 8px 19px -3px rgba(0, 0, 0, 0.27);
            transition: all 250ms;
            overflow: hidden;
        }

        button::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            height: 100%;
            width: 0;
            border-radius: 8px;
            background-color: var(--body-color);
            z-index: -1;
            -webkit-box-shadow: 4px 8px 19px -3px rgba(0, 0, 0, 0.27);
            box-shadow: 4px 8px 19px -3px rgba(0, 0, 0, 0.27);
            transition: all 250ms;
        }

        button:hover {
            color: #e8e8e8;
        }

        button:hover::before {
            width: 100%;
        }

        #topBtn{
            position: fixed;
            bottom: 2px;
            left: 12px;
            font-size: 22px;
            width: 50px;
            height: 50px;
            background-color: var(--body-color);
            color: #eeeeee;
            border: none;
            cursor: pointer;
            display: none;
        }

        /*cssbutton.io  ==  https://uiverse.io/ */
    </style>

    @yield('head')
</head>
<body>
<div class="" style="overflow-x: auto">
    <nav>
        <div class="nav-bar">
            <i class='bx bx-menu bx-md sidebarOpen'></i>
            <span class="logo navLogo text-nowrap"><a href="{{url("/")}}">{{ config('app.name', 'Laravel') }}</a></span>

            <div class="menu">
                <div class="logo-toggle">
                    <span class="logo"><a href="{{url("/")}}" id="nav-off">{{config('app.name','Laravel')}}</a></span>
                    <i class='bx bx-x bx-md sidebarClose' id="nav-off"></i>
                </div>
                <hr class="nav-img">
                <div class="nav-img">
                    <img src="{{asset("images/logo/profile real.jpg")}}" style="max-height: 500px; object-fit:fill" class="d-block w-100 shadow-lg text-center" alt="...">
                </div>
                <hr class="mb-0 nav-img">
                <ul class="nav-links text-uppercase mt-0">
                    <li><a href="{{route('welcome')}}" id="nav-off"
                           class="{{route('welcome')== request()->url()? "hover":""}}" title="မူလစာမျက်နှာ">Home</a>
                    </li>
                    <li class="dropdown">
                        <a href="javascript:void(0)" class="dropbtn" title="ထုတ်ကုန်ပစ္စည်းများ">Products</a>
                        <div class="dropdown-content">
                            @foreach(\App\Models\Category::all() as $category)
                                <a href="{{route("category.show",$category->id)}}" class="nocolor text-nowrap" title="{{$category->hover}}" id="nav-off">
                                    {{$category->title}}
                                </a>
                            @endforeach
                        </div>
                    </li>

                    @if(auth()->user())
                        <li class="dropdown">
                            <a href="javascript:void(0)" class="dropbtn" title="အကြောင်းအရာများ">About</a>
                            <div class="dropdown-content">
                                <a href="{{route('aboutZawMinHtwe.me')}}" id="nav-off" class="nocolor text-nowrap" title="ကိုယ်ပိုင်ပိုစ်နှင့် အသုံးပြုသူ ပိုစ်များ">{{\Illuminate\Support\Facades\Auth::user()->name}} & Others</a>
                            </div>
                        </li>
                    @else
                        <li class="dropdown">
                            <a href="javascript:void(0)" class="dropbtn" title="အကြောင်းအရာများ">About</a>
                            <div class="dropdown-content">
                                <a href="{{route('aboutZawMinHtwe.me')}}" id="nav-off" class="nocolor text-nowrap" title="အသုံးပြုသူ ပိုစ်များ">All Users Post</a>
                            </div>
                        </li>
                    @endif

                    <li class="dropdown">
                        <a href="javascript:void(0)" class="dropbtn">Portfolio</a>
                        <div class="dropdown-content">
                            <a href="{{route('developer')}}" id="nav-off" class="nocolor text-nowrap">Developer</a>
                        </div>
                    </li>
                    <li class="dropdown">
                        <a href="#" title="ဝန်ဆောင်မှုများ">Services</a>
                        <div class="dropdown-content">
                            <a href="https://youtu.be/ycFJcFA2bfk" id="nav-off" class="nocolor text-nowrap">HTML</a>
                            <a href="https://youtu.be/k9noJBieBnE" id="nav-off" class="nocolor text-nowrap">CSS</a>
                            <a href="#" id="nav-off" class="nocolor text-nowrap">Java Script</a>
                            <a href="#" id="nav-off" class="nocolor text-nowrap">PHP</a>
                            <a href="#" id="nav-off" class="nocolor text-nowrap">Laravel</a>
                            <a href="#" id="nav-off" class="nocolor text-nowrap">Bulid Website</a>
                        </div>
                    </li>
                    <li class="dropdown">
                        @guest()
                            <a href="javascript:void(0)" class="dropbtn text-nowrap" title="အကောင့်အသစ်လုပ်ရန်">New
                                Account</a>
                        @endguest
                        @auth()
                                <a href="javascript:void(0)" class="dropbtn text-nowrap" title="အဓိကစာမျက်နှာ" id="nav-off">Main Page</a>
                            @endauth
                        <div class="dropdown-content">
                            @if (Route::has('login'))
                                @auth
                                    @if(\Illuminate\Support\Facades\Auth::user()->role == 0)
                                        <a href="{{ url('/home') }}" class="nocolor text-nowrap text-sm text-gray-700 dark:text-gray-500 underline" id="nav-off">Dashboard</a>
                                    @else
                                        <a href="{{ url('/post') }}" class="nocolor text-nowrap text-sm text-gray-700 dark:text-gray-500 underline" id="nav-off">All Products</a>
                                    @endif
                                @else
                                    <a href="{{ route('login') }}" class="nocolor text-nowrap text-sm text-gray-700 dark:text-gray-500 underline" id="nav-off">Log in</a>
                                    @if (Route::has('register'))
                                        <a href="{{ route('register') }}" class="nocolor text-nowrap ml-4 text-sm text-gray-700 dark:text-gray-500 underline" id="nav-off">Register</a>
                                    @endif
                                @endauth
                            @endif
                        </div>
                    </li>
                    <?php
                    use App\Http\Controllers\CartController;
                    $total = CartController::cartItem();
                    ?>
                    @auth()

                        <li>
                            <a href="{{route('cart.index')}}"
                               class="{{route('cart.index')== request()->url()? "hover":""}}" id="nav-off" title="">Cart({{$total}})</a>
                        </li>
                    @endauth
                </ul>
            </div>
            <div class="darkLight-searchBox" style="margin-right: 20px;">
                <div class="dark-light">
                    <i class='bx bx-moon moon'></i>
                    <i class='bx bx-sun sun'></i>
                </div>

                <div class="searchBox">
                    <div class="searchToggle">
                        <i class='bx bx-x cancel'></i>
                        <i class='bx bx-search search'></i>
                    </div>
                    <div class="search-field">
                        <input type="text" name="input" class="form-control" placeholder="Search..." form="form">
                        <i class='bx bx-search search'></i>
                        <form action="{{route('welcome-search')}}" class="" method="post" id="form">
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</div>
<div class="container-fluid" style="margin-top: 5rem !important;">

    @yield('content')
{{--    {{dd($socialShare)}}--}}
    @include('blog-layouts.footer')
    <small id="topBtn" class="text-center"><i class="fas fa-arrow-up"></i></small>
</div>

<script src="{{ asset('js/app.js') }}"></script>

@stack('scripts')
<script>
    //scrolltop start
    $(document).ready(function(){
        $(window).scroll(function(){
            if($(this).scrollTop() > 40){
                $("#topBtn").fadeIn();
            }else{
                $("#topBtn").fadeOut();
            }
        });
        $("#topBtn").click(function(){
            $('html,body').animate({scrollTop:0},800);
        });
    });
    //scrolltop stop
</script>
</body>
</html>

<example>
    {{--<!DOCTYPE html>--}}
    {{--<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">--}}
    {{--    <head>--}}
    {{--        <meta charset="utf-8">--}}
    {{--        <meta name="viewport" content="width=device-width, initial-scale=1">--}}

    {{--        <title>Laravel</title>--}}

    {{--        <!-- Styles -->--}}
    {{--        <link href="{{ asset('css/app.css') }}" rel="stylesheet">--}}

    {{--        <!-- Fonts -->--}}
    {{--        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">--}}

    {{--        <!-- Styles -->--}}
    {{--        <style>--}}
    {{--            /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */html{line-height:1.15;-webkit-text-size-adjust:100%}body{margin:0}a{background-color:transparent}[hidden]{display:none}html{font-family:system-ui,-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Arial,Noto Sans,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol,Noto Color Emoji;line-height:1.5}*,:after,:before{box-sizing:border-box;border:0 solid #e2e8f0}a{color:inherit;text-decoration:inherit}svg,video{display:block;vertical-align:middle}video{max-width:100%;height:auto}.bg-white{--bg-opacity:1;background-color:#fff;background-color:rgba(255,255,255,var(--bg-opacity))}.bg-gray-100{--bg-opacity:1;background-color:#f7fafc;background-color:rgba(247,250,252,var(--bg-opacity))}.border-gray-200{--border-opacity:1;border-color:#edf2f7;border-color:rgba(237,242,247,var(--border-opacity))}.border-t{border-top-width:1px}.flex{display:flex}.grid{display:grid}.hidden{display:none}.items-center{align-items:center}.justify-center{justify-content:center}.font-semibold{font-weight:600}.h-5{height:1.25rem}.h-8{height:2rem}.h-16{height:4rem}.text-sm{font-size:.875rem}.text-lg{font-size:1.125rem}.leading-7{line-height:1.75rem}.mx-auto{margin-left:auto;margin-right:auto}.ml-1{margin-left:.25rem}.mt-2{margin-top:.5rem}.mr-2{margin-right:.5rem}.ml-2{margin-left:.5rem}.mt-4{margin-top:1rem}.ml-4{margin-left:1rem}.mt-8{margin-top:2rem}.ml-12{margin-left:3rem}.-mt-px{margin-top:-1px}.max-w-6xl{max-width:72rem}.min-h-screen{min-height:100vh}.overflow-hidden{overflow:hidden}.p-6{padding:1.5rem}.py-4{padding-top:1rem;padding-bottom:1rem}.px-6{padding-left:1.5rem;padding-right:1.5rem}.pt-8{padding-top:2rem}.fixed{position:fixed}.relative{position:relative}.top-0{top:0}.right-0{right:0}.shadow{box-shadow:0 1px 3px 0 rgba(0,0,0,.1),0 1px 2px 0 rgba(0,0,0,.06)}.text-center{text-align:center}.text-gray-200{--text-opacity:1;color:#edf2f7;color:rgba(237,242,247,var(--text-opacity))}.text-gray-300{--text-opacity:1;color:#e2e8f0;color:rgba(226,232,240,var(--text-opacity))}.text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}.text-gray-500{--text-opacity:1;color:#a0aec0;color:rgba(160,174,192,var(--text-opacity))}.text-gray-600{--text-opacity:1;color:#718096;color:rgba(113,128,150,var(--text-opacity))}.text-gray-700{--text-opacity:1;color:#4a5568;color:rgba(74,85,104,var(--text-opacity))}.text-gray-900{--text-opacity:1;color:#1a202c;color:rgba(26,32,44,var(--text-opacity))}.underline{text-decoration:underline}.antialiased{-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.w-5{width:1.25rem}.w-8{width:2rem}.w-auto{width:auto}.grid-cols-1{grid-template-columns:repeat(1,minmax(0,1fr))}@media (min-width:640px){.sm\:rounded-lg{border-radius:.5rem}.sm\:block{display:block}.sm\:items-center{align-items:center}.sm\:justify-start{justify-content:flex-start}.sm\:justify-between{justify-content:space-between}.sm\:h-20{height:5rem}.sm\:ml-0{margin-left:0}.sm\:px-6{padding-left:1.5rem;padding-right:1.5rem}.sm\:pt-0{padding-top:0}.sm\:text-left{text-align:left}.sm\:text-right{text-align:right}}@media (min-width:768px){.md\:border-t-0{border-top-width:0}.md\:border-l{border-left-width:1px}.md\:grid-cols-2{grid-template-columns:repeat(2,minmax(0,1fr))}}@media (min-width:1024px){.lg\:px-8{padding-left:2rem;padding-right:2rem}}@media (prefers-color-scheme:dark){.dark\:bg-gray-800{--bg-opacity:1;background-color:#2d3748;background-color:rgba(45,55,72,var(--bg-opacity))}.dark\:bg-gray-900{--bg-opacity:1;background-color:#1a202c;background-color:rgba(26,32,44,var(--bg-opacity))}.dark\:border-gray-700{--border-opacity:1;border-color:#4a5568;border-color:rgba(74,85,104,var(--border-opacity))}.dark\:text-white{--text-opacity:1;color:#fff;color:rgba(255,255,255,var(--text-opacity))}.dark\:text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}.dark\:text-gray-500{--tw-text-opacity:1;color:#6b7280;color:rgba(107,114,128,var(--tw-text-opacity))}}--}}
    {{--        </style>--}}

    {{--        <style>--}}
    {{--            body {--}}
    {{--                font-family: 'Nunito', sans-serif;--}}
    {{--            }--}}
    {{--        </style>--}}
    {{--    </head>--}}
    {{--    <body class="antialiased">--}}
    {{--        <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">--}}
    {{--            @if (Route::has('login'))--}}
    {{--                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">--}}
    {{--                    @auth--}}
    {{--                        <a href="{{ url('/home') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Home</a>--}}
    {{--                    @else--}}
    {{--                        <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>--}}

    {{--                        @if (Route::has('register'))--}}
    {{--                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>--}}
    {{--                        @endif--}}
    {{--                    @endauth--}}
    {{--                </div>--}}
    {{--            @endif--}}
    {{--                <h1 class="animate__animated animate__bounce">An animated element</h1>--}}
    {{--                <button class="btn btn-primary">adfadfds</button>--}}
    {{--            <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">--}}
    {{--                <div class="flex justify-center pt-8 sm:justify-start sm:pt-0">--}}
    {{--                    <svg viewBox="0 0 651 192" fill="none" xmlns="http://www.w3.org/2000/svg" class="h-16 w-auto text-gray-700 sm:h-20 animate__pulse">--}}
    {{--                        <g clip-path="url(#clip0)" fill="#EF3B2D">--}}
    {{--                            <path d="M248.032 44.676h-16.466v100.23h47.394v-14.748h-30.928V44.676zM337.091 87.202c-2.101-3.341-5.083-5.965-8.949-7.875-3.865-1.909-7.756-2.864-11.669-2.864-5.062 0-9.69.931-13.89 2.792-4.201 1.861-7.804 4.417-10.811 7.661-3.007 3.246-5.347 6.993-7.016 11.239-1.672 4.249-2.506 8.713-2.506 13.389 0 4.774.834 9.26 2.506 13.459 1.669 4.202 4.009 7.925 7.016 11.169 3.007 3.246 6.609 5.799 10.811 7.66 4.199 1.861 8.828 2.792 13.89 2.792 3.913 0 7.804-.955 11.669-2.863 3.866-1.908 6.849-4.533 8.949-7.875v9.021h15.607V78.182h-15.607v9.02zm-1.431 32.503c-.955 2.578-2.291 4.821-4.009 6.73-1.719 1.91-3.795 3.437-6.229 4.582-2.435 1.146-5.133 1.718-8.091 1.718-2.96 0-5.633-.572-8.019-1.718-2.387-1.146-4.438-2.672-6.156-4.582-1.719-1.909-3.032-4.152-3.938-6.73-.909-2.577-1.36-5.298-1.36-8.161 0-2.864.451-5.585 1.36-8.162.905-2.577 2.219-4.819 3.938-6.729 1.718-1.908 3.77-3.437 6.156-4.582 2.386-1.146 5.059-1.718 8.019-1.718 2.958 0 5.656.572 8.091 1.718 2.434 1.146 4.51 2.674 6.229 4.582 1.718 1.91 3.054 4.152 4.009 6.729.953 2.577 1.432 5.298 1.432 8.162-.001 2.863-.479 5.584-1.432 8.161zM463.954 87.202c-2.101-3.341-5.083-5.965-8.949-7.875-3.865-1.909-7.756-2.864-11.669-2.864-5.062 0-9.69.931-13.89 2.792-4.201 1.861-7.804 4.417-10.811 7.661-3.007 3.246-5.347 6.993-7.016 11.239-1.672 4.249-2.506 8.713-2.506 13.389 0 4.774.834 9.26 2.506 13.459 1.669 4.202 4.009 7.925 7.016 11.169 3.007 3.246 6.609 5.799 10.811 7.66 4.199 1.861 8.828 2.792 13.89 2.792 3.913 0 7.804-.955 11.669-2.863 3.866-1.908 6.849-4.533 8.949-7.875v9.021h15.607V78.182h-15.607v9.02zm-1.432 32.503c-.955 2.578-2.291 4.821-4.009 6.73-1.719 1.91-3.795 3.437-6.229 4.582-2.435 1.146-5.133 1.718-8.091 1.718-2.96 0-5.633-.572-8.019-1.718-2.387-1.146-4.438-2.672-6.156-4.582-1.719-1.909-3.032-4.152-3.938-6.73-.909-2.577-1.36-5.298-1.36-8.161 0-2.864.451-5.585 1.36-8.162.905-2.577 2.219-4.819 3.938-6.729 1.718-1.908 3.77-3.437 6.156-4.582 2.386-1.146 5.059-1.718 8.019-1.718 2.958 0 5.656.572 8.091 1.718 2.434 1.146 4.51 2.674 6.229 4.582 1.718 1.91 3.054 4.152 4.009 6.729.953 2.577 1.432 5.298 1.432 8.162 0 2.863-.479 5.584-1.432 8.161zM650.772 44.676h-15.606v100.23h15.606V44.676zM365.013 144.906h15.607V93.538h26.776V78.182h-42.383v66.724zM542.133 78.182l-19.616 51.096-19.616-51.096h-15.808l25.617 66.724h19.614l25.617-66.724h-15.808zM591.98 76.466c-19.112 0-34.239 15.706-34.239 35.079 0 21.416 14.641 35.079 36.239 35.079 12.088 0 19.806-4.622 29.234-14.688l-10.544-8.158c-.006.008-7.958 10.449-19.832 10.449-13.802 0-19.612-11.127-19.612-16.884h51.777c2.72-22.043-11.772-40.877-33.023-40.877zm-18.713 29.28c.12-1.284 1.917-16.884 18.589-16.884 16.671 0 18.697 15.598 18.813 16.884h-37.402zM184.068 43.892c-.024-.088-.073-.165-.104-.25-.058-.157-.108-.316-.191-.46-.056-.097-.137-.176-.203-.265-.087-.117-.161-.242-.265-.345-.085-.086-.194-.148-.29-.223-.109-.085-.206-.182-.327-.252l-.002-.001-.002-.002-35.648-20.524a2.971 2.971 0 00-2.964 0l-35.647 20.522-.002.002-.002.001c-.121.07-.219.167-.327.252-.096.075-.205.138-.29.223-.103.103-.178.228-.265.345-.066.089-.147.169-.203.265-.083.144-.133.304-.191.46-.031.085-.08.162-.104.25-.067.249-.103.51-.103.776v38.979l-29.706 17.103V24.493a3 3 0 00-.103-.776c-.024-.088-.073-.165-.104-.25-.058-.157-.108-.316-.191-.46-.056-.097-.137-.176-.203-.265-.087-.117-.161-.242-.265-.345-.085-.086-.194-.148-.29-.223-.109-.085-.206-.182-.327-.252l-.002-.001-.002-.002L40.098 1.396a2.971 2.971 0 00-2.964 0L1.487 21.919l-.002.002-.002.001c-.121.07-.219.167-.327.252-.096.075-.205.138-.29.223-.103.103-.178.228-.265.345-.066.089-.147.169-.203.265-.083.144-.133.304-.191.46-.031.085-.08.162-.104.25-.067.249-.103.51-.103.776v122.09c0 1.063.568 2.044 1.489 2.575l71.293 41.045c.156.089.324.143.49.202.078.028.15.074.23.095a2.98 2.98 0 001.524 0c.069-.018.132-.059.2-.083.176-.061.354-.119.519-.214l71.293-41.045a2.971 2.971 0 001.489-2.575v-38.979l34.158-19.666a2.971 2.971 0 001.489-2.575V44.666a3.075 3.075 0 00-.106-.774zM74.255 143.167l-29.648-16.779 31.136-17.926.001-.001 34.164-19.669 29.674 17.084-21.772 12.428-43.555 24.863zm68.329-76.259v33.841l-12.475-7.182-17.231-9.92V49.806l12.475 7.182 17.231 9.92zm2.97-39.335l29.693 17.095-29.693 17.095-29.693-17.095 29.693-17.095zM54.06 114.089l-12.475 7.182V46.733l17.231-9.92 12.475-7.182v74.537l-17.231 9.921zM38.614 7.398l29.693 17.095-29.693 17.095L8.921 24.493 38.614 7.398zM5.938 29.632l12.475 7.182 17.231 9.92v79.676l.001.005-.001.006c0 .114.032.221.045.333.017.146.021.294.059.434l.002.007c.032.117.094.222.14.334.051.124.088.255.156.371a.036.036 0 00.004.009c.061.105.149.191.222.288.081.105.149.22.244.314l.008.01c.084.083.19.142.284.215.106.083.202.178.32.247l.013.005.011.008 34.139 19.321v34.175L5.939 144.867V29.632h-.001zm136.646 115.235l-65.352 37.625V148.31l48.399-27.628 16.953-9.677v33.862zm35.646-61.22l-29.706 17.102V66.908l17.231-9.92 12.475-7.182v33.841z"/>--}}
    {{--                        </g>--}}
    {{--                    </svg>--}}
    {{--                </div>--}}

    {{--                <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">--}}
    {{--                    <div class="grid grid-cols-1 md:grid-cols-2">--}}
    {{--                        <div class="p-6">--}}
    {{--                            <div class="flex items-center">--}}
    {{--                                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-8 h-8 text-gray-500"><path d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>--}}
    {{--                                <div class="ml-4 text-lg leading-7 font-semibold"><a href="https://laravel.com/docs" class="underline text-gray-900 dark:text-white">Documentation</a></div>--}}
    {{--                            </div>--}}

    {{--                            <div class="ml-12">--}}
    {{--                                <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">--}}
    {{--                                    Laravel has wonderful, thorough documentation covering every aspect of the framework. Whether you are new to the framework or have previous experience with Laravel, we recommend reading all of the documentation from beginning to end.--}}
    {{--                                </div>--}}
    {{--                            </div>--}}
    {{--                        </div>--}}

    {{--                        <div class="p-6 border-t border-gray-200 dark:border-gray-700 md:border-t-0 md:border-l">--}}
    {{--                            <div class="flex items-center">--}}
    {{--                                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-8 h-8 text-gray-500"><path d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"></path><path d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>--}}
    {{--                                <div class="ml-4 text-lg leading-7 font-semibold"><a href="https://laracasts.com" class="underline text-gray-900 dark:text-white">Laracasts</a></div>--}}
    {{--                            </div>--}}

    {{--                            <div class="ml-12">--}}
    {{--                                <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">--}}
    {{--                                    Laracasts offers thousands of video tutorials on Laravel, PHP, and JavaScript development. Check them out, see for yourself, and massively level up your development skills in the process.--}}
    {{--                                </div>--}}
    {{--                            </div>--}}
    {{--                        </div>--}}

    {{--                        <div class="p-6 border-t border-gray-200 dark:border-gray-700">--}}
    {{--                            <div class="flex items-center">--}}
    {{--                                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-8 h-8 text-gray-500"><path d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"></path></svg>--}}
    {{--                                <div class="ml-4 text-lg leading-7 font-semibold"><a href="https://laravel-news.com/" class="underline text-gray-900 dark:text-white">Laravel News</a></div>--}}
    {{--                            </div>--}}

    {{--                            <div class="ml-12">--}}
    {{--                                <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">--}}
    {{--                                    Laravel News is a community driven portal and newsletter aggregating all of the latest and most important news in the Laravel ecosystem, including new package releases and tutorials.--}}
    {{--                                </div>--}}
    {{--                            </div>--}}
    {{--                        </div>--}}

    {{--                        <div class="p-6 border-t border-gray-200 dark:border-gray-700 md:border-l">--}}
    {{--                            <div class="flex items-center">--}}
    {{--                                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-8 h-8 text-gray-500"><path d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>--}}
    {{--                                <div class="ml-4 text-lg leading-7 font-semibold text-gray-900 dark:text-white">Vibrant Ecosystem</div>--}}
    {{--                            </div>--}}

    {{--                            <div class="ml-12">--}}
    {{--                                <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">--}}
    {{--                                    Laravel's robust library of first-party tools and libraries, such as <a href="https://forge.laravel.com" class="underline">Forge</a>, <a href="https://vapor.laravel.com" class="underline">Vapor</a>, <a href="https://nova.laravel.com" class="underline">Nova</a>, and <a href="https://envoyer.io" class="underline">Envoyer</a> help you take your projects to the next level. Pair them with powerful open source libraries like <a href="https://laravel.com/docs/billing" class="underline">Cashier</a>, <a href="https://laravel.com/docs/dusk" class="underline">Dusk</a>, <a href="https://laravel.com/docs/broadcasting" class="underline">Echo</a>, <a href="https://laravel.com/docs/horizon" class="underline">Horizon</a>, <a href="https://laravel.com/docs/sanctum" class="underline">Sanctum</a>, <a href="https://laravel.com/docs/telescope" class="underline">Telescope</a>, and more.--}}
    {{--                                </div>--}}
    {{--                            </div>--}}
    {{--                        </div>--}}
    {{--                    </div>--}}
    {{--                </div>--}}

    {{--                <div class="flex justify-center mt-4 sm:items-center sm:justify-between">--}}
    {{--                    <div class="text-center text-sm text-gray-500 sm:text-left">--}}
    {{--                        <div class="flex items-center">--}}
    {{--                            <svg fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor" class="-mt-px w-5 h-5 text-gray-400">--}}
    {{--                                <path d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>--}}
    {{--                            </svg>--}}

    {{--                            <a href="https://laravel.bigcartel.com" class="ml-1 underline">--}}
    {{--                                Shop--}}
    {{--                            </a>--}}

    {{--                            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="ml-4 -mt-px w-5 h-5 text-gray-400">--}}
    {{--                                <path d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>--}}
    {{--                            </svg>--}}

    {{--                            <a href="https://github.com/sponsors/taylorotwell" class="ml-1 underline">--}}
    {{--                                Sponsor--}}
    {{--                            </a>--}}
    {{--                        </div>--}}
    {{--                    </div>--}}

    {{--                    <div class="ml-4 text-center text-sm text-gray-500 sm:text-right sm:ml-0">--}}
    {{--                        Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </body>--}}
    {{--</html>--}}
</example>
