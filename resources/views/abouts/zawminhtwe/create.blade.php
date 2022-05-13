@extends('layouts.app')
@section("title") Create Post : {{ env("APP_NAME") }} @endsection
@section('head')
    <style>
        .cover-img{
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
                    <h4 class="mb-0">Create New Post</h4>
                    <p class="mb-0">
                        <i class="fas fa-calendar text-primary"></i>
                        {{ date("d M Y") }}
                    </p>
                </div>

                <form action="{{ route('aboutZawMinHtwe.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-floating mb-4">
                        <input type="text" name="title" class="form-control border-radius @error('title') is-invalid @enderror" id="postTitle" placeholder="no need" value="{{old("title")}}">
                        <label for="postTitle">Post Title</label>
                        @error("title")
                        <small class="invalid-feedback">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <img src="{{ asset('images/logo/profile real.jpg') }}" id="coverPreview" class="cover-img w-100 h-50 rounded @error('cover') is-invalid border border-danger @enderror" alt="">
                        <input type="file" name="cover" class="d-none" id="cover" accept="image/jpeg,image/png">
                        @error("cover")
                        <small class="invalid-feedback">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-floating mb-4">
                        <textarea name="description" class="form-control @error('description') is-invalid @enderror" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 450px">
                            {{old("description")}}
                        </textarea>
                        <label for="floatingTextarea2">Share Your Experience</label>
                        @error("description")
                        <small class="invalid-feedback">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="text-center mb-4">
                        <button class="btn btn-lg btn-primary">
                            <i class="fas fa-credit-card text-white"></i>
                            Create Post
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection
@push("scripts")
    <script>
        let coverPreview = document.querySelector("#coverPreview");
        let cover = document.querySelector("#cover");
        coverPreview.addEventListener("click",_=>cover.click())
        cover.addEventListener("change",_=>{
            let file = cover.files[0];
            let reader = new FileReader();
            reader.onload = function (){
                coverPreview.src = reader.result;
            }
            reader.readAsDataURL(file);
        })
    </script>
@endpush
