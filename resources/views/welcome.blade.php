@extends('blog-layouts.app')
@section('head')
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

        nav .nav-bar .sideBarOpen {
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
            padding: 10px;
        }

        .nav-links li a::before {
            content: "";
            position: absolute;
            left: 45%;
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
            width: 50%;
            margin-left: 45px;
            justify-content: center;
            margin-right: 45px;
            transition: all 0.5s ease-in;
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

        @media (max-width: 790px) {
            nav .nav-bar .sideBarOpen {
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

            .logo-toggle .sideBarClose {
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
            border-radius: 20px;
            text-align: center;
            margin-bottom: 8px;

        }

        li.dropdown {
            display: inline-block;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: var(--nav-color);
            min-width: 200px;
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
            z-index: 1;
        }

        .dropdown-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
            text-align: left;
        }

        .dropdown-content a:hover {
            background-color: var(--nav-color);
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }

        /*//drop down css stop*/


        /*cssbutton.io*/
        /* From cssbuttons.io by @alexroumi */
        button {
            padding: 10px 20px;
            border: unset;
            border-radius: 25px;
            color: var(--nav-color);
            z-index: 1;
            background: var(--body-color);
            position: relative;
            font-weight: 500;
            font-size: 17px;
            -webkit-box-shadow: 4px 8px 19px -3px rgba(0,0,0,0.27);
            box-shadow: 4px 8px 19px -3px rgba(0,0,0,0.27);
            transition: all 250ms;
            overflow: hidden;
            margin-bottom: 8px;

        }
        button a{
            text-decoration: none;
        }

        button::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            height: 100%;
            width: 0;
            border-radius: 25px;
            background-color: var(--nav-color);
            z-index: -1;
            -webkit-box-shadow: 4px 8px 19px -3px rgba(0,0,0,0.27);
            box-shadow: 4px 8px 19px -3px rgba(0,0,0,0.27);
            transition: all 300ms
        }

        button:hover {
            color: #e8e8e8;
        }

        button:hover::before {
            width: 100%;
        }
        /*cssbutton.io*/
        .footer-body-color{
            background: var(--nav-color);
        }

    </style>
@endsection
@section('content')
            <div class="row">
            </div>
            <br>
            <div class="row justify-content-between custom-margin" id="card-style">
                @foreach(\App\Models\Post::get() as $item)
                    <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3 col-xl-3 d-flex align-items-stretch">
                        <div class="card p-0 mb-3 animate__animated animate__zoomIn">
                            <div class="inner w-100">
{{--                                <img class="card-img-top img-responsive w-100" src="" alt="Card image cap">--}}
                                <a class="venobox" data-gall="img{{ $item->id }}" href="{{asset('storage/product_photo/'.$item['gallery'])}}"><img src="{{asset('storage/product_photo/'.$item['gallery'])}}" class="w-100" alt="image alt"/></a>
                            </div>
                            <div class="card-body text-center">
                                <h3 class="card-title">
                                    Balance- ({{$item['balance']}})Package
                                </h3>
                                <i class="text-black-50">(ဈေးနှုန်းအပြောင်းအလဲ ရှိနိုင်သည်)</i>
                                <p>{{$item['name']}}</p>
                                <p class="card-text ">
                                    {{\Illuminate\Support\Str::substr($item['description'],0,35)}}....
                                </p>
                            </div>
                            <div class="row">
                                <div class="text-center">
                                   <button class="animate__animated animate__fadeIn"><a href="{{route('welcome-detail',$item->id)}}" class=" mb-2 text-white text-nowrap align-items-center animate__animated animate__fadeIn">View Details</a></button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

@endsection
@push('scripts')
    <script>
        new VenoBox({
            selector: '.venobox',
            numeration: true,
            infinigall: true,
            share: true,
            spinner: 'rotating-plane'
        });
    </script>

@endpush
