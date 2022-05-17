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
                        <h1>{{$details['title']}}}</h1>
                        <h1>{{$details['body']}}}</h1>
                        <h1>Thank You</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection


@push('scripts')

@endpush

