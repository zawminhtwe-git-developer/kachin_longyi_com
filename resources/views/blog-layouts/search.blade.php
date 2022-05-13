@extends('blog-layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="row">
            @foreach($products as $item)
            <div class="col-12 col-md-6 mb-2">
                    <div class="card">
                        <div class="card-body">
                            <p class="card-text">The Results of {{request()->input("input")}}</p>
                        </div>
                        <img class="trending-image" src="{{asset('storage/product_photo/'.$item['gallery'])}}">
                        <div class="card-body">
                            <h2>{{$item['name']}}</h2>
                            <p>{{$item['description']}}</p>
                        </div>
                    </div>
            </div>
            @endforeach
        </div>
    </div>
@endsection
