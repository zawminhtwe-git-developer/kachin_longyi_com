@extends('layouts.app')
@section("title") Edit Post : {{ env("APP_NAME") }} @endsection
@section('head')
    <style>
        .cover-img {
            height: 350px;
            object-fit: cover;
        }
    </style>
@endsection
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10 col-xl-8">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h4 class="mb-0">Edit Post</h4>
                    <p class="mb-0">
                        <i class="fas fa-calendar"></i>
                        {{ date("d M Y") }}
                    </p>
                </div>

                <form action="{{ route('aboutZawMinHtwe.update',$aboutZawMinHtwe->id) }}" method="post"
                      enctype="multipart/form-data" id="zawminhtwe-update">
                    @csrf
                    @method("PUT")
                    <div class="form-floating mb-4">
                        <input type="text" name="title" value="{{old("title",$aboutZawMinHtwe->title)}}"
                               class="form-control border-radius @error('title') is-invalid @enderror" id="postTitle"
                               placeholder="no need">
                        <label for="postTitle">Post Title</label>
                        @error("title")
                        <small class="invalid-feedback">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <img src="{{ asset('storage/cover/'.$aboutZawMinHtwe->cover) }}" id="coverPreview"
                             class="cover-img w-100 h-100 rounded @error('cover') is-invalid border border-danger @enderror"
                             alt="">
                        <input type="file" name="cover" class="d-none" id="cover">
                        @error("cover")
                        <small class="invalid-feedback">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-floating mb-4">
                        <textarea name="description" class="form-control @error('description') is-invalid @enderror"
                                  placeholder="Leave a comment here" id="floatingTextarea2"
                                  style="height: 450px">{{old("description",$aboutZawMinHtwe->description)}}</textarea>
                        <label for="floatingTextarea2">Share Your Thinking</label>
                        @error("description")
                        <small class="invalid-feedback">{{ $message }}</small>
                        @enderror
                    </div>
                </form>

                {{--                    multiple image upload start--}}
                <div class="border rounded p-4 mb-2" id="gallery">
                    <div class="d-flex align-items-stretch">
                        <div class="border px-4 rounded-2 d-flex justify-content-center align-items-center" style="height: 150px;"  id="upload-ui" >
                            <i class="fas fa-upload"></i>
                        </div>
                        <div class="d-flex overflow-scroll border rounded me-2" style="height: 150px;">
                            @forelse($aboutZawMinHtwe->galleries as $gallery)
                                <img src="{{asset('storage/gallery/'.$gallery->photo)}}" alt="" class="h-100 rounded me-2">
                               @can("delete",$gallery)
                                    <form action="{{ route("gallery.destroy",$gallery->id) }}" method="post">
                                        @csrf
                                        @method("DELETE")
                                        <button class="btn btn-danger" style="margin-left:-50px">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </form>
                                @endcan
                            @empty
                               <p class="py-5"> Nothing to show relative image</p>
                            @endforelse

                        </div>
                    </div>
                    <form action="{{route('gallery.store')}}"  method="post" enctype="multipart/form-data" id="gallery-upload">
                        @csrf
                        <input type="hidden" name="aboutZawMinHtwe_id" value="{{$aboutZawMinHtwe->id}}">
                        <div class="">
                            <input type="file" name="galleries[]" multiple class="d-none @error("galleries") is-invalid @enderror @error("galleries.*") is-invalid @enderror" id="gallery-input">
                            @error("galleries")
                            <small class="invalid-feedback">{{ $message }}</small>
                            @enderror
                            @error("galleries.*")
                            <small class="invalid-feedback">{{ $message }}</small>
                            @enderror
                        </div>
                    </form>
                </div>
                {{--                    multiple image upload stop--}}

                <div class="text-center mb-4">
                    <button class="btn btn-lg btn-primary" form="zawminhtwe-update">
                        <i class="fas fa-credit-card text-white"></i>
                        Update Post
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection
@push("scripts")
    <script>
        let coverPreview = document.querySelector("#coverPreview");
        let cover = document.querySelector("#cover");
        coverPreview.addEventListener("click", _ => cover.click())
        cover.addEventListener("change", _ => {
            let file = cover.files[0];
            let reader = new FileReader();
            reader.onload = function () {
                coverPreview.src = reader.result;
            }
            reader.readAsDataURL(file);
        })


        // multiple image upload js start
        // သူကိုနှိပ်လိုက်ရင်
        let uploadUi= document.getElementById("upload-ui");

        // သူကို့ နှိုးမယ်
        let galleryInput= document.getElementById("gallery-input");

        // နှိုးပြီးရင် တင်လိူက်မယ်
        let uploadUpload= document.getElementById("gallery-upload");

        uploadUi.addEventListener("click",_=>galleryInput.click());
        galleryInput.addEventListener("change",_=>uploadUpload.submit());
        // multiple image upload js stop


    </script>
@endpush
