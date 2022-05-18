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

            <div class="row mb-2">
                <div class="col-12">
                    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-indicators">
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                        </div>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="{{asset("images/logo/profile real.jpg")}}" style="max-height: 500px; object-fit:fill" class="d-block w-100 shadow-lg text-center" alt="...">
{{--                                <img src="{{ asset('images/logo/profile real.jpg') }}"--}}
                            </div>
                            <div class="carousel-item">
                                <img src="{{asset("images/logo/profile real.jpg")}}" style="max-height: 500px;object-fit: fill" class="d-block w-100 text-center" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="{{asset("images/logo/profile real.jpg")}}" style="max-height: 500px;object-fit: fill" class="d-block w-100 text-center" alt="...">
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
            </div>
            <div class="row justify-content-between custom-margin" id="card-style">
                @foreach(\App\Models\Post::get() as $item)
                    <div class="col-12 col-sm-4 col-md-3 col-lg-3 col-xl-3 d-flex align-items-stretch">
                        <div class="card p-0 mb-3 animate__animated animate__zoomIn">
                            <div class="card-header">
                                <h4 class="text-center"><i><b>"{{$item['name']}}"</b></i></h4>
                            </div>
                            <div class="inner w-100">
                                <a class="venobox" data-gall="img{{ $item->id }}" href="{{asset('storage/product_photo/'.$item['gallery'])}}">
                                    <img src="{{asset('storage/product_photo/'.$item['gallery'])}}" class="w-100" style="height: 100%" alt="image alt"/>
                                </a>
                            </div>

                            <div class="card-body">

                                <h3>Price - (<i><b>{{$item['sale_price']}}</b></i>) MMK</h3>
                                <hr>
                                <h4 class="card-title">
                                    Balance- (<i><b>{{$item['balance']}}</b></i>)Package
                                </h4>
                                <hr>
                                <p class="card-text ">
                                    {{\Illuminate\Support\Str::substr($item['description'],0,70)}}.... <a href="{{route('welcome-detail',$item->id)}}" class="text-black-50"><small>read more</small></a>
                                </p>
                            </div>
                            <div class="row">
                                <div class="text-center d-flex justify-content-between p-3">
                                <div>
                                    <button class="animate__animated animate__fadeIn"><a href="{{route('welcome-detail',$item->id)}}" class=" mb-2 text-white text-nowrap align-items-center animate__animated animate__fadeIn">View Details</a></button>
                                </div>
                                  <div>
                                      <form action="{{route("cart.store")}}" method="POST">
                                          @csrf

                                          <input type="hidden" name="post_id" value="{{$item['id']}}">
                                          <button class="mb-2 text-white text-nowrap align-items-center animate__animated animate__fadeIn"><i class="fas fa-cart-plus">Add to Cart</i></button>
                                      </form>
                                  </div>
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
