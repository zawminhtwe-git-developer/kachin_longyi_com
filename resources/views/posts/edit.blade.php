@extends('layouts.app')
@section("title")
    Edit Post
@endsection

@section('content')

    <div class="container-fluid">
        <x-bread-crumb>
            <li class="breadcrumb-item"><a href="{{route('post.index')}}">Posts</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit</li>
        </x-bread-crumb>
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">Create Post</div>
                    <div class="card-body">
                        <form method="post" action="{{route('post.update',$post->id)}}" enctype="multipart/form-data" id="post-update">
                            @csrf
                            @method("put")
                            <div class="form-group">
                                <label for="name">Post Name</label>
                                <input type="text" class="form-control" name="name" id="name" aria-describedby="emailHelp" value="{{$post->name}}">
                                @error("name")
                                <small class="text-danger font-weight-bold">{{ $message }}</small>
                                @enderror
                                @if ($errors->has('name'))
                                    <span class="text-danger">{{ $errors->first('name') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="price">Purchase Price</label>
                                <input type="text" class="form-control" name="purchase_price" id="price" aria-describedby="emailHelp" value="{{$post->purchase_price}}">
                                @error("purchase_price")
                                <small class="text-danger font-weight-bold">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="price">Sale Price</label>
                                <input type="text" class="form-control" name="sale_price" id="sale_price" aria-describedby="emailHelp" value="{{$post->sale_price}}">
                                @error("sale_price")
                                <small class="text-danger font-weight-bold">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Select Category</label>
                                <div class="">
                                    <div class="btn-group btn-group-toggle w-100" data-toggle="buttons">
                                        <select name="category_id" id="" class="form-control">
                                            @foreach(\App\Models\Category::all() as $c)
                                                <option value="{{ $c->id }}"{{ $post->category_id == $c->id ? "selected" : "" }}> {{ $c->title }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                @error("category")
                                <small class="text-danger font-weight-bold">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea type="text" class="form-control" name="description" id="description" aria-describedby="emailHelp">{{$post->description}}</textarea>
                                @error("description")
                                <small class="text-danger font-weight-bold">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="balance">Balance</label>
                                <input type="text" class="form-control" name="balance" id="balance" aria-describedby="emailHelp" value="{{$post->balance}}">
                                @error("balance")
                                <small class="text-danger font-weight-bold">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="gallery">Photo</label>
                                <input type="file" class="form-control p-1" name="gallery" id="gallery" aria-describedby="emailHelp" value="{{$post->gallery}}">
                                <br>
                                @if($post->gallery)
                                    <img id="gallery" src="{{ url("storage/product_photo/".$post->gallery) }}" height="70" width="70" class="img-thumbnail">
                                @endif
                                @error("gallery")
                                <small class="text-danger font-weight-bold">{{ $message }}</small>
                                @enderror
                            </div>
                        </form>
                            <div class="form-group mt-2">
                                <input type="submit" class="btn btn-primary" name="submit" value="Update Product" form="post-update">
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 d-flex">
                <form action="{{route("postGallery.store")}}" method="post" enctype="multipart/form-data" id="postGallery_store">
                    @csrf
                    <input type="hidden" name="post_id" value="{{$post->id}}">
                    <input type="file" name="postGalleries[]" multiple class="d-none @error("postGalleries") is-invalid @enderror @error("postGalleries.*") is-invalid @enderror" id="file">
                    @error("galleries")
                    <small class="invalid-feedback">{{ $message }}</small>
                    @enderror
                    @error("postGalleries.*")
                    <small class="invalid-feedback">{{ $message }}</small>
                    @enderror
                    <i class="fas fa-upload" id="postGallery_upload">Relative Image Upload</i>
                </form>

                <div class="d-flex overflow-scroll border rounded me-2" style="height: 150px;">
                    @forelse($post->postGalleries as $gallery)
                        <img src="{{asset('storage/postGalleries/'.$gallery->photo)}}" alt="" class="h-100 rounded me-2">
                        @can("delete",$gallery)
                            <form action="{{ route("postGallery.destroy",$gallery->id) }}" method="post">
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
        </div>
    </div>


@endsection
@push("scripts")
    <script>
        let postGallery_upload= document.getElementById("postGallery_upload");
        let postGallery_store= document.getElementById("postGallery_store");
        let file= document.getElementById("file");


        postGallery_upload.addEventListener("click",_=>file.click());
        file.addEventListener("change",_=>postGallery_store.submit());


        // let coverPreview = document.querySelector("#coverPreview");
        // let cover = document.querySelector("#cover");
        // coverPreview.addEventListener("click", _ => cover.click())
        // cover.addEventListener("change", _ => {
        //     let file = cover.files[0];
        //     let reader = new FileReader();
        //     reader.onload = function () {
        //         coverPreview.src = reader.result;
        //     }
        //     reader.readAsDataURL(file);
        // })
        //
        //
        // // multiple image upload js start
        // // သူကိုနှိပ်လိုက်ရင်
        // let uploadUi= document.getElementById("upload-ui");
        //
        // // သူကို့ နှိုးမယ်
        // let galleryInput= document.getElementById("gallery-input");
        //
        // // နှိုးပြီးရင် တင်လိူက်မယ်
        // let uploadUpload= document.getElementById("gallery-upload");
        //
        // uploadUi.addEventListener("click",_=>galleryInput.click());
        // galleryInput.addEventListener("change",_=>uploadUpload.submit());
        // // multiple image upload js stop


    </script>
@endpush
