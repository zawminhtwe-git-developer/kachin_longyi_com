@extends('layouts.app')
@section('title')
    Create Category
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Create Category</li>
                    </ol>
                </nav>
            </div>
        </div>
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
                                    <div class="col-12">
                                        <input type="text" class="form-control @error('title') is-invalid @enderror"
                                               name="title">
                                        @error('title')
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
@section('script')

@endsection
