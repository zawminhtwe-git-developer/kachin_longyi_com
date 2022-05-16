<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!--website title-->
    <title>@yield('title','Admin Dashboard')</title>


    <!--https://metatags.io-->
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

    <link rel="icon" class="rounded" href="{{ asset('images/logo/profile real.jpg') }}">


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @yield('head')
    <style>
        :root {
            --offcanvas-width: 250px;
            --topNavbarHeight: 52px;
        }

        .sidebar-nav {
            width: var(--offcanvas-width);
        }

        .sidebar-link {
            display: flex;
            align-items: center;
        }

        .sidebar-link .right-icon {
            display: inline-flex;
            transition: all ease 0.2s;
        }

        .sidebar-link[aria-expanded="true"] .right-icon {
            transform: rotate(180deg);
        }
        .dataTables_length{
            position: absolute;
            right: 15px;
        }


        @media (min-width: 992px) {
            body {
                overflow: auto !important;
            }

            .offcanvas-backdrop::before {
                display: none;
            }
            main{
                margin-left: var(--offcanvas-width);
            }
            .sidebar-nav {
                transform: none;
                visibility: visible !important;
                top: var(--topNavbarHeight);
                height: calc(100% - var(--topNavbarHeight));
            }
        }

    </style>

</head>
<body>
<div id="app">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container-fluid">
            {{--            offcanvas trigger--}}
            <button class="navbar-toggler me-3" type="button" data-bs-toggle="offcanvas"
                    data-bs-target="#offcanvasExample"
                    aria-controls="offcanvasExample">
                <span class="navbar-toggler-icon" data-bs-target="#offcanvasExample"></span>
            </button>
            {{--            offcanvas trigger--}}
            <a class="navbar-brand fw-bold text-uppercase me-auto" href="{{ url("/") }}">{{config('app.name')}}</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">

                <form class="d-flex ms-auto">
                    <div class="input-group my-3 my-lg-0">
                        <input type="text" class="form-control" placeholder="Recipient's username"
                               aria-label="Recipient's username" aria-describedby="button-addon2">
                        <button class="btn btn-primary" type="button" id="button-addon2">
                            <i class="bi bi-search-heart-fill"></i>
                        </button>
                    </div>
                </form>
                <ul class="navbar-nav mb-2 mb-lg-0">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle " href="#" id="navbarDropdown" role="button"
                           data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="{{isset(Auth::user()->photo)?asset('storage/profile/'.Auth::user()->photo) : asset('images/logo/me.jpg')}}" class="rounded-circle" style="width: 25px; height: 25px;" alt="">
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="{{route("profile")}}">Profile</a></li>
                            <li><a class="dropdown-item" href="{{route("user-manager.changeProfile")}}">Edit Information</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </li>

                </ul>
            </div>
        </div>
    </nav>
    {{--navbar stop--}}

    {{--offcanvas start--}}
    <div class="offcanvas offcanvas-start bg-dark text-white sidebar-nav" tabindex="-1" id="offcanvasExample"
         aria-labelledby="offcanvasExampleLabel">
        <div class="offcanvas-header d-lg-none">
            <h5 class="offcanvas-title fw-bolder" id="offcanvasExampleLabel">{{config('app.name')}}</h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body p-0">
            {{--            <ul class="list-group">--}}
            {{--                <x-side-bar-link name="Home" link="{{route('home')}}" icon="fas fa-book-open"></x-side-bar-link>--}}
            {{--                <li class="list-group-item d-flex justify-content-between align-items-start">--}}
            {{--                    <div class="ms-2 me-auto">--}}
            {{--                        <div class="fw-bold">Subheading</div>--}}
            {{--                        Content for list item--}}
            {{--                    </div>--}}
            {{--                    <span class="badge bg-primary rounded-pill">14</span>--}}
            {{--                </li>--}}

            {{--            </ul>--}}

            <nav class="navbar-dark">
                <ul class="navbar-nav">
                    <li>
                        <div class="text-black text-uppercase small fw-bold px-3">
                            Core
                        </div>
                    </li>
                    <li>
                        <a href="{{route("home")}}" class="nav-link px-3 {{request()->routeIs("home")?"active":""}}">
                            <span class="me-2">
                                <i class="bi bi-speedometer2"></i>
                            </span>
                            @if(auth()->user())
                                @if(auth()->user()->role == 0)
                                    <span>Dashboard</span>
                                @elseif(auth()->user()->role == 1)
                                    <span>Role 1 user view</span>
                                @elseif(auth()->user()->role == 2)
                                    <span>Role 2 user view</span>
                                @endif
                            @endif
                        </a>
                    </li>

                    <li class="my-3">
                        <hr class="dropdown-divider">
                    </li>

{{--                    *********************************************************************************--}}

                    <li>
                        <div class="text-black text-uppercase small fw-bold px-3">
                            Categories & Products
                        </div>
                    </li>
                    @if(auth()->user()->role == 0)
                    <li>
                        <a class="nav-link px-3 sidebar-link" data-bs-toggle="collapse" href="#collapseExample0"
                           role="button" aria-expanded="false" aria-controls="collapseExample0">
                            <span class="me-2">
                                <i class="bi bi-layout-split"></i>
                            </span>
                            <span>Category</span>
                            <span class="right-icon ms-auto">
                                <i class="bi bi-chevron-down"></i>
                            </span>
                        </a>
                        <div class="collapse" id="collapseExample0">
                            <div class="">
                                <ul class="navbar-nav ps-3">
                                    <li>
                                        <a href="{{route("category.create")}}" class="nav-link px-3 {{request()->routeIs("category.create")?"active":""}}">
                                            <span class="me-2">
                                            <i class="bi bi-postcard"></i>
                                            </span>
                                            <span>Create Category</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{route("category.index")}}" class="nav-link px-3 {{request()->routeIs("category.index")?"active":""}}">
                                            <span class="me-2">
                                            <i class="bi bi-card-list"></i>
                                            </span>
                                            <span>View Category</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </li>
                    @endif
                    <li>
                        <a class="nav-link px-3 sidebar-link" data-bs-toggle="collapse" href="#collapseExample1"
                           role="button" aria-expanded="false" aria-controls="collapseExample1">
                            <span class="me-2">
                                <i class="bi bi-layout-split"></i>
                            </span>
                            <span>Product</span>
                            <span class="right-icon ms-auto">
                                <i class="bi bi-chevron-down"></i>
                            </span>
                        </a>
                        <div class="collapse" id="collapseExample1">
                            <div class="">
                                <ul class="navbar-nav ps-3">
                                    @if(auth()->user()->role == 0)
                                    <li>
                                        <a href="{{route("post.create")}}" class="nav-link px-3 {{request()->routeIs("post.create")?"active":""}}">
                                            <span class="me-2">
                                            <i class="bi bi-postcard"></i>
                                            </span>
                                            <span>Create Product</span>
                                        </a>
                                    </li>
                                    @endif
                                    <li>
                                        <a href="{{route("post.index")}}" class="nav-link px-3 {{request()->routeIs("post.index")?"active":""}}">
                                            <span class="me-2">
                                            <i class="bi bi-card-list"></i>
                                            </span>
                                            <span>View Product</span>
                                        </a>
                                    </li>
                                        <li>
                                            <a href="{{route("order.index")}}" class="nav-link px-3 {{request()->routeIs("order.index")?"active":""}}">
                                            <span class="me-2">
                                            <i class="bi bi-card-list"></i>
                                            </span>
                                                <span>My Orders</span>
                                            </a>
                                        </li>

                                </ul>
                            </div>
                        </div>
                    </li>
                    @if(auth()->user()->role == 0)
                    <li>
                        <a class="nav-link px-3 sidebar-link" data-bs-toggle="collapse" href="#collapseExample4"
                           role="button" aria-expanded="false" aria-controls="collapseExample4">
                            <span class="me-2">
                                <i class="bi bi-layout-split"></i>
                            </span>
                            <span>Skill Share</span>
                            <span class="right-icon ms-auto">
                                <i class="bi bi-chevron-down"></i>
                            </span>
                        </a>
                        <div class="collapse" id="collapseExample4">
                            <div class="">
                                <ul class="navbar-nav ps-3">
                                    <li>
                                        <a href="{{route("shareSkill.create")}}" class="nav-link px-3 {{request()->routeIs("shareSkill.create")?"active":""}}">
                                            <span class="me-2">
                                            <i class="bi bi-postcard"></i>
                                            </span>
                                            <span>Skill Share create</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{route("shareSkill.index")}}" class="nav-link px-3 {{request()->routeIs("shareSkill.index")?"active":""}}">
                                            <span class="me-2">
                                            <i class="bi bi-card-list"></i>
                                            </span>
                                            <span>Skill Share Post</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </li>
                    @endif
{{--                    ****************************************************************************************--}}
                    <li class="my-3">
                        <hr class="dropdown-divider">
                    </li>

                    <li>
                        <div class="text-black text-uppercase small fw-bold px-3">
                            Interface
                        </div>
                    </li>
                    <li>

                        <a class="nav-link px-3 sidebar-link" data-bs-toggle="collapse" href="#collapseExample"
                           role="button" aria-expanded="false" aria-controls="collapseExample">
                            <span class="me-2">
                                <i class="bi bi-layout-split"></i>
                            </span>
                            <span>All Posts</span>
                            <span class="right-icon ms-auto">
                                <i class="bi bi-chevron-down"></i>
                            </span>
                        </a>
                        <div class="collapse" id="collapseExample">
                            <div class="">
                                <ul class="navbar-nav ps-3">
                                    <li>
                                        <a href="{{route("aboutZawMinHtwe.create")}}" class="nav-link px-3 {{request()->routeIs("aboutZawMinHtwe.create")?"active":""}}">
                                            <span class="me-2">
                                            <i class="bi bi-postcard"></i>
                                            </span>
                                            <span>Create Post</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{route("aboutZawMinHtwe.index")}}" class="nav-link px-3 {{request()->routeIs("aboutZawMinHtwe.index")?"active":""}}">
                                            <span class="me-2">
                                            <i class="bi bi-card-list"></i>
                                            </span>
                                            <span>View Posts</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </li>


                    <li class="my-3">
                        <hr class="dropdown-divider">
                    </li>
                    <li>
                        <div class="text-black text-uppercase small fw-bold px-3">
                           User Information
                        </div>
                    </li>
                    <li>
                        <a class="nav-link px-3 sidebar-link" data-bs-toggle="collapse" href="#collapseExample3"
                           role="button" aria-expanded="false" aria-controls="collapseExample3">
                            <span class="me-2">
                                <i class="bi bi-layout-split"></i>
                            </span>
                            <span>Edit User Info:</span>
                            <span class="right-icon ms-auto">
                                <i class="bi bi-chevron-down"></i>
                            </span>
                        </a>
                        <div class="collapse" id="collapseExample3">
                            <div class="">
                                <ul class="navbar-nav ps-3">
                                    @if(auth()->user())
                                        @if(auth()->user()->role == 0)
                                            <li>
                                                <a href="{{route("user-manager.index")}}" class="nav-link px-3 {{request()->routeIs("user-manager.index")?"active":""}}">
                                            <span class="me-2">
                                            <i class="bi bi-postcard"></i>
                                            </span>
                                                    <span>User Lists</span>
                                                </a>
                                            </li>
                                        @endif
                                    @endif
                                    <li>
                                        <a href="{{route("user-manager.changeProfile")}}" class="nav-link px-3 {{request()->routeIs("user-manager.changeProfile")?"active":""}}">
                                            <span class="me-2">
                                            <i class="bi bi-card-list"></i>
                                            </span>
                                            <span>Change Profile</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
    {{--offcanvas stop--}}
    <main class="mt-2 pt-2">
        <div class="row py-4"></div>
        @yield('content')
    </main>
</div>
<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
@yield('foot')
@stack("scripts")
@if(session('status'))
    <script>
        let toastInfo = @json(session('status'));
        // alert(toastInfo)

        const Toast = Swal.mixin({
            toast: true,
            position: 'bottom-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })

        Toast.fire({
            icon: toastInfo.icon,
            title: toastInfo.title
        })

    </script>
@endif
</body>
</html>

