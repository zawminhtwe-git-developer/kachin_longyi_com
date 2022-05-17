@extends('layouts.app')
@section("head")
    <style>
        .cover-img{
            margin-top: 15px;
            height: 600px !important;
            width: 400px !important;
        }
        @media (max-width: 790px) {
            .cover-img {
                height: 100% !important;
                width: 100% !important;
            }
        }
    </style>
@endsection
@section('content')
    <div class="container-fluid">
        <x-bread-crumb>
            <li class="breadcrumb-item"><a href="{{route('post.index')}}">View Products</a></li>
            <li class="breadcrumb-item active" aria-current="page">Create New Item</li>
        </x-bread-crumb>
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">Create Product</div>
                    <div class="card-body">
                        {{--                        @if ($errors->any())--}}
                        {{--                            <div class="alert alert-danger">--}}
                        {{--                                <ul>--}}
                        {{--                                    @foreach ($errors->all() as $error)--}}
                        {{--                                        <li>{{ $error }}</li>--}}
                        {{--                                    @endforeach--}}
                        {{--                                </ul>--}}
                        {{--                            </div>--}}
                        {{--                        @endif--}}
                        <form method="post" action="{{route('post.store')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="name" title="ပစ္စည်းအမျိုးအမည်">Product Name</label>
                                <input type="text" class="form-control" name="name" id="name" placeholder="ပစ္စည်းအမျိုးအမည်"
                                       aria-describedby="emailHelp" value="{{old('name')}}">
                                @error("name")
                                <small class="text-danger font-weight-bold">{{ $message }}</small>
                                @enderror
                                @if ($errors->has('name'))
                                    <span class="text-danger">{{ $errors->first('name') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="price" title="ဝယ်ရင်းဈေးနှုန်း">Purchase Price</label>
                                <input type="text" class="form-control" name="purchase_price" id="price"
                                   placeholder="ဝယ်ရင်းဈေးနှုန်း"    aria-describedby="emailHelp" value="{{old('purchase_price')}}">
                                @error("purchase_price")
                                <small class="text-danger font-weight-bold">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="price" title="ရောင်းဈေးနှုန်း">Sale Price</label>
                                <input type="text" class="form-control" name="sale_price" id="price" placeholder="ရောင်းဈေးနှုန်း"
                                       aria-describedby="emailHelp" value="{{old('sale_price')}}">
                                @error("sale_price")
                                <small class="text-danger font-weight-bold">{{ $message }}</small>
                                @enderror
                            </div>

                            {{--                            <div class="form-group">--}}
                            {{--                                <label for="category">Category</label>--}}
                            {{--                                <input type="text" class="form-control" name="category" id="category" aria-describedby="emailHelp" value="{{old('category')}}">--}}
                            {{--                                --}}
                            {{--                                @error("category")--}}
                            {{--                                <small class="text-danger font-weight-bold">{{ $message }}</small>--}}
                            {{--                                @enderror--}}
                            {{--                            </div>--}}

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-6">
                                        <label>Select Category</label>
                                        <div class="">
                                            <div class="btn-group btn-group-toggle w-100" data-toggle="buttons">
                                                <select name="category_id" id="" class="form-control">
{{--                                                    <option value="" autofocus>--Choose One--</option>--}}
                                                    @foreach($categories as $c)
                                                        <option value="{{ $c->id }}"> {{ $c->title }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        {{--                                <div class="">--}}
                                        {{--                                    <div class="btn-group btn-group-toggle w-100" data-toggle="buttons">--}}
                                        {{--                                        @foreach($categories as $c)--}}
                                        {{--                                            <label class="btn btn-outline-secondary text-nowrap table-responsive">--}}
                                        {{--                                                <input type="radio" name="category" id="option1" value="{{ $c->id }}" {{ old('category') == $c->id ? "checked" : "" }}> {{ $c->title }}--}}
                                        {{--                                            </label>--}}
                                        {{--                                        @endforeach--}}
                                        {{--                                    </div>--}}
                                        {{--                                </div>--}}
                                        @error("category")
                                        <small class="text-danger font-weight-bold">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-6 mt-3 pt-2">
                                        <!-- Button trigger modal -->
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                            New Category
                                        </button>

                                    </div>
                                </div>
                            </div>


                            <div class="form-group">
                                <label for="description" title="ဖော်ပြချက်ရေးရန်">Description</label>
                                <textarea type="text" class="form-control" name="description" id="description" placeholder="ဖော်ပြချက်ရေးရန်"
                                          aria-describedby="emailHelp">{{old('description')}}</textarea>
                                @error("description")
                                <small class="text-danger font-weight-bold">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="balance" title="ပစ္စည်းလက်ကျန်">Balance</label>
                                <input type="text" class="form-control" name="balance" id="balance" placeholder="ပစ္စည်းလက်ကျန်"
                                       aria-describedby="emailHelp" value="{{old('balance')}}">
                                @error("balance")
                                <small class="text-danger font-weight-bold">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="gallery" title="ပုံတင်ရန် ပုံကိုနှိပ်ပါ">Photo</label>
                                <img  src="{{ asset('images/logo/profile real.jpg') }}" id="galleryPreview" class="cover-img rounded @error('gallery') is-invalid border border-danger @enderror" alt="">
                                <input type="file" class="form-control p-1 d-none" name="gallery" id="gallery" accept="image/jpeg,image/png"
                                       aria-describedby="emailHelp" value="{{old('gallery')}}">
                                @error("gallery")
                                <small class="text-danger font-weight-bold">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group mt-2">
                                <input type="submit" class="btn btn-primary" name="submit" value="Save">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Create New Category</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <form action="{{ route('category.store') }}" method="post" id="create_category">
                                        @csrf
                                        <div class="mb-3">
                                            <div class="row">
                                                <div class="col-12 mb-2">
                                                    <input type="text" class="form-control @error('title') is-invalid @enderror"
                                                           name="title" placeholder="English Category">
                                                    @error('title')
                                                    <p class="small text-danger">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                                <div class="col-12">
                                                    <input type="text" class="form-control @error('hover') is-invalid @enderror"
                                                           name="hover" placeholder="Myanmar Category">
                                                    @error('hover')
                                                    <p class="small text-danger">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="card-footer">
                                    <div class="col-3">
                                        <button class="btn btn-primary" form="create_category">Create</button>
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

@push("scripts")
    <script>
        let coverPreview = document.querySelector("#galleryPreview");
        let cover = document.querySelector("#gallery");
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

{{--<form action="{{ route('aboutZawMinHtwe.store') }}" method="post" enctype="multipart/form-data">--}}
{{--    @csrf--}}

{{--    <div class="mb-4">--}}
{{--        <img src="{{ asset('images/logo/profile real.jpg') }}" id="coverPreview" class="cover-img w-100 h-50 rounded @error('cover') is-invalid border border-danger @enderror" alt="">--}}
{{--        <input type="file" name="cover" class="d-none" id="cover" accept="image/jpeg,image/png">--}}
{{--        @error("cover")--}}
{{--        <small class="invalid-feedback">{{ $message }}</small>--}}
{{--        @enderror--}}
{{--    </div>--}}


{{--    <div class="text-center mb-4">--}}
{{--        <button class="btn btn-lg btn-primary">--}}
{{--            <i class="fas fa-credit-card text-white"></i>--}}
{{--            Create Post--}}
{{--        </button>--}}
{{--    </div>--}}

{{--</form>--}}
