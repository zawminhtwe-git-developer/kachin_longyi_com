@auth()
    @extends('layouts.app')
@section("title")
    Daily Life From: {{env("APP_NAME")}}
@endsection
@section('head')
    <style>
        .h-350 {
            height: 350px;
        }

        .user-img {
            width: 40px;
            height: 40px;
        }

        .cover-img {
            height: 350px;
            object-fit: cover;
        }

        .post {
            border-bottom: 1px solid black;
            padding-bottom: 1.5rem;
        }

        .post:last-child {
            border-bottom: none;
        }

        .gallery-photo{
            height: 200px;
            width: 100%;
            border-radius: 1rem;
            padding: 5px;
            object-fit: cover;
        }

    </style>
@endsection
@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10 col-xl-8">
                <div class="post mb-4">
                    <div class="row">
                        <div class="">
                            <h4 class="fw-bold mb-4">{{ $aboutZawMinHtwe->title }}</h4>
                            <img src="{{ asset("storage/cover/".$aboutZawMinHtwe->cover) }}"
                                 class="cover-img rounded-3 w-100" alt="">
                            <p class="text-black-50 mt-2" style="text-align: justify;  text-indent: 50px">
                                {{ $aboutZawMinHtwe->description }}
                            </p>

                            {{--                        multiple realtive photo show--}}
                            @if($aboutZawMinHtwe->galleries->count())
                                <div class="gallery rounded mb-5">
                                    <h4 class="text-center text-primary fw-bold mb-4">Relative Galleries</h4>
                                    <div class="row g-4 py-4 px-2">
                                        @foreach($aboutZawMinHtwe->galleries as $gallery)
                                            <div class="col-6 col-lg-4 col-xl-3 justify-content-center">
                                                <a class="venobox" href="{{asset('storage/gallery/'.$gallery->photo)}}" data-gall="img{{ $aboutZawMinHtwe->id }}">
                                                    <img src="{{asset('storage/gallery/'.$gallery->photo)}}" class="w-100 gallery-photo" alt="image alt"/>
                                                </a>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @endif
                            {{--                        multiple realtive photo show--}}

                            @auth()
                                <div class="row align-items-center justify-content-center">
                                    <div class="col-lg-8 ">
                                        <div class="comments">
                                            <div class="row">
                                                {{ $aboutZawMinHtwe->comment }}
                                                @forelse($aboutZawMinHtwe->comments as $comment)
                                                    <div class="d-flex justify-content-between mb-3">
                                                        <div class="d-flex">
                                                            <img
                                                                src="{{ asset("storage/profile/".$comment->user->photo) }}"
                                                                class="user-img rounded-circle mb-4 border border-primary"
                                                                alt="This image is not show alt data!">

                                                            <p class="text-black mb-4">
                                                                {{ $comment->user->name }}
                                                                <br>
                                                                <i class="fas fa-calendar"></i>
                                                                {{ $comment->created_at->diffForHumans() }}
                                                            </p>
                                                        </div>
                                                        <div>
                                                            @can("delete",$comment)
                                                                <form action="{{route("comment.destroy",$comment->id)}}"
                                                                      method="post" class="d-inline-block">
                                                                    @csrf
                                                                    @method("delete")
                                                                    <button class="btn btn-primary">Delete</button>
                                                                </form>
                                                            @endcan
                                                        </div>
                                                    </div>
                                                    <div class="text-black-50">
                                                        <p>
                                                            {{$comment->message}}
                                                        </p>
                                                    </div>
                                                @empty
                                                    <p class="text-primary text-center">********************************************</p>
                                                    @auth
                                                        Start Comment Now...
                                                    @endauth
                                                    @guest
                                                        <a href="{{route('login')}}" class="text-success">Login</a> to comment
                                                    @endguest
                                                @endforelse
                                            </div>
                                        </div>

                                        <form action="{{route("comment.store")}}" method="post" id="comment-create">
                                            @csrf
                                            <input type="hidden" name="aboutZawMinHtwe_id"
                                                   value="{{$aboutZawMinHtwe->id}}">
                                            <div class="form-floating mb-3">
                                                <textarea name="message" id="comment-create" cols="30" rows="20"
                                                          class="form-control @error('message') is-invalid @enderror"
                                                          placeholder="hello"></textarea>
                                                @error("message")
                                                <div class="invalid-feedback ps-2">
                                                    {{$message}}
                                                </div>
                                                @enderror
                                            </div>
                                            <div class="text-center mb-2">
                                                <button class="btn btn-success">Comment</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            @endauth


                            <div class="row">
                                <div class="col-12">
                                    <div class="d-flex justify-content-between align-items-center rounded border p-4">
                                        <div class="d-flex">
                                            {{--                                       <img src="{{ asset("storage/profile/".$aboutZawMinHtwe->user->photo) }}"--}}
                                            {{--                                            class="user-img rounded-circle mb-4" alt="This image is not show alt data!">--}}
                                            <img
                                                src="{{isset(Auth::user()->photo)? asset('storage/profile/'.Auth::user()->photo) : asset('images/logo/me.jpg')}}"
                                                alt="" class="user-img mb-4 rounded-circle border border-primary"
                                                alt="This image is not show alt data!">
                                            <p class="text-black-50 mb-4">
                                                {{ $aboutZawMinHtwe->user->name }}
                                                <br>
                                                <i class="fas fa-calendar"></i>
                                                {{ $aboutZawMinHtwe->created_at->format("d M Y") }}

                                            </p>
                                        </div>
                                        <div class="">
                                            @auth()
                                                @can("delete",$aboutZawMinHtwe)
                                                    <form
                                                        action="{{route("aboutZawMinHtwe.destroy",$aboutZawMinHtwe->id)}}"
                                                        method="post" class="d-inline-block">
                                                        @csrf
                                                        @method("DELETE")
                                                        <button class="btn btn-outline-danger">Delete</button>
                                                    </form>
                                                @endcan
                                                @can("update",$aboutZawMinHtwe)
                                                    <a href="{{route("aboutZawMinHtwe.edit",$aboutZawMinHtwe->id)}}"
                                                       class="btn btn-outline-warning ">Edit</a>
                                                @endcan
                                            @endauth
                                            <a href="{{route("aboutZawMinHtwe.index")}}"
                                               class="btn btn-outline-primary">
                                                Read All</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        new VenoBox({
            selector: '.venobox'
        });
    </script>
@endpush
@endauth



