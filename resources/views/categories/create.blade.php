@extends('layouts.app')
@section('title')
    Create Category
@endsection
@section('content')
    <div class="container-fluid">
        <x-bread-crumb>
            <li class="breadcrumb-item"><a href="{{route('category.index')}}">View Category</a></li>
            <li class="breadcrumb-item active" aria-current="page">Create Category</li>
        </x-bread-crumb>
        <div class="row">
            <div class="col-sm-12 col-md-6 col-xl-4">
                <div class="card">
                    <div class="card-header">
                        <h4>Create Category</h4>
                    </div>
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
                {{--            @if ($errors->any())--}}
                {{--                <div class="alert alert-danger">--}}
                {{--                    <ul>--}}
                {{--                        @foreach ($errors->all() as $error)--}}
                {{--                            <li>{{ $error }}</li>--}}
                {{--                        @endforeach--}}
                {{--                    </ul>--}}
                {{--                </div>--}}
                {{--            @endif--}}
            </div>
        </div>
    </div>
@endsection
@push("scripts")

@endpush
