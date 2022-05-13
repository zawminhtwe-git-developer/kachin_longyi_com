@extends('layouts.app')
@section('head')
    <style>
        .h-350{
            height: 350px;
        }

        .user-img{
            width: 40px;
            height: 40px;
        }

        .cover-img{
            height: 350px;
            object-fit: cover;
        }

        .post{
            border-bottom: 1px solid black;
            padding-bottom: 1.5rem;
        }

        .post:last-child{
            border-bottom: none;
        }

    </style>
@endsection
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10 col-xl-8">
                @auth
                    <div class="border rounded-3 p-4 d-flex justify-content-between align-items-center mb-4">
                        <h4 class="text-black-50 fw-bold">
                            Welcome
                            <br>
                            <span class="text-dark">{{ auth()->user()->name }}</span>
                        </h4>
                        <a href="{{ route('aboutZawMinHtwe.create') }}" class="btn btn-lg btn-primary">Create Post</a>
                    </div>
                @endauth

                <div class="posts">
                    @forelse($aboutZawMinHtwes as $aboutZawMinHtwe)

                        <div class="post mb-4 aboutzawminhtwe">
                            <div class="row">
                                <div class="col-lg-4">
                                    <a class="venobox" href="{{ asset("storage/cover/".$aboutZawMinHtwe->cover) }}" data-gall="img{{ $aboutZawMinHtwe->id }}">
                                        <img src="{{ asset("storage/cover/".$aboutZawMinHtwe->cover) }}"   class="cover-img rounded-3 w-100 animate__animated animate__zoomIn" alt="">
                                    </a>
                                </div>
                                <div class="col-lg-8 bg-light">
                                    <div class="d-flex flex-column justify-content-between h-350 py-4">
                                        <div class="">
                                            <h4 class="fw-bold">{{ $aboutZawMinHtwe->title }}</h4>
                                            <p class="text-black-50" style="text-align: justify;  text-indent: 50px">
                                                {{ $aboutZawMinHtwe->excerpt }}
                                            </p>
                                        </div>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="d-flex">

                                                <img src="{{ isset($aboutZawMinHtwe->user)?asset("storage/profile/".$aboutZawMinHtwe->user->photo):asset('images/logo/me.jpg')}}"
                                                     class="user-img rounded-circle" alt="">
                                                <p class="mb-0 ms-2 small">
                                                  @isset( $aboutZawMinHtwe->user)
                                                        {{ $aboutZawMinHtwe->user->name }}
                                                    @else
                                                            Guest Account
                                                    @endisset
                                                    <br>
                                                    <i class="fas fa-calendar"></i>
                                                    {{ $aboutZawMinHtwe->created_at->format("d M Y") }}
                                                </p>
                                            </div>
                                            <a href="{{route("aboutZawMinHtwe.detail",$aboutZawMinHtwe->slug)}}" class="btn btn-outline-primary">Read More</a>
{{--                                            <a href="{{route("aboutZawMinHtwe.show",$aboutZawMinHtwe->id)}}" class="btn btn-outline-primary">Read More ID</a>--}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    @empty
                            Ther is no post yet!
                    @endforelse
                </div>
                <div class="d-flex justify-content-center align-items-center">
                    {{ $aboutZawMinHtwes->links() }}
                </div>

            </div>
        </div>
    </div>
@endsection
@push("scripts")
    <script src="https://unpkg.com/scrollreveal"></script>
    <script>
        new VenoBox({
            selector: '.venobox'
        });

        ScrollReveal().reveal('.post',{
            origin:"top",
            distance:"30px",
            duration:500,
            interval:800
        })
    </script>
    @endpush
