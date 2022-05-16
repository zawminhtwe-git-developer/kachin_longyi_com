@extends('layouts.app')

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
                                <label for="name">Product Name</label>
                                <input type="text" class="form-control" name="name" id="name"
                                       aria-describedby="emailHelp" value="{{old('name')}}">
                                @error("name")
                                <small class="text-danger font-weight-bold">{{ $message }}</small>
                                @enderror
                                @if ($errors->has('name'))
                                    <span class="text-danger">{{ $errors->first('name') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="price">Purchase Price</label>
                                <input type="text" class="form-control" name="purchase_price" id="price"
                                       aria-describedby="emailHelp" value="{{old('purchase_price')}}">
                                @error("purchase_price")
                                <small class="text-danger font-weight-bold">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="price">Sale Price</label>
                                <input type="text" class="form-control" name="sale_price" id="price"
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
                                <label for="description">Description</label>
                                <textarea type="text" class="form-control" name="description" id="description"
                                          aria-describedby="emailHelp">{{old('description')}}</textarea>
                                @error("description")
                                <small class="text-danger font-weight-bold">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="balance">Balance</label>
                                <input type="text" class="form-control" name="balance" id="balance"
                                       aria-describedby="emailHelp" value="{{old('balance')}}">
                                @error("balance")
                                <small class="text-danger font-weight-bold">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="gallery">Photo</label>
                                <input type="file" class="form-control p-1" name="gallery" id="gallery"
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


@push('scripts')

@endpush

