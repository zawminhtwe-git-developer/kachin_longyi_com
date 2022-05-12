@extends('layouts.app')
@section('content')
    <div class="custom-product justify-content-center">
        <div class="col-sm-4">
            <a href="#">Filter</a>
        </div>
        <div class="col-sm-10">
            <div class="trending-wrapper">
                <h4>Results For Products</h4>
                <a class="btn btn-success" href="ordernow">Order Now</a><br><br>
                @foreach($products as $item)
                    <div class="row searched-item cart-list-devider">
                        <div class="col-sm-3">
                            <a href="detail/{{$item->id}}">
                                <img class="trending-image" src="{{$item->gallery}}" style="height: 200px" alt="">
                            </a>
                        </div>
                        <div class="col-sm-3">
                            <h2>{{$item->name}}</h2>
                            <h5></h5>{{$item->description}}</h2>
                        </div>
                        <div class="col-sm-3">
                            <a href="/removeCart/{{$item->cart_id}}" class="btn btn-warning">Remove From Cart</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <a class="btn btn-success" href="ordernow">Order Now</a><br><br>
@endsection


