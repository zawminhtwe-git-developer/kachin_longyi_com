@extends('layouts.app')
@section('title')
    Create Category
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row my-5">
            <div class="col-12">
                <h4>Edit Category</h4>
                <form action="{{ route('category.update',$category->id) }}" method="post">
                    @csrf
                    @method('put')
                    <div class="mb-3">
                        <div class="row">
                            <div class="col-3">
                                <input type="text" class="form-control " value="{{ $category->title }}" name="title">
                            </div>
                            <div class="col-3">
                                <button class="btn btn-primary">Update</button>
                            </div>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@push("scripts")

@endpush

