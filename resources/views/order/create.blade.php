@extends('layouts.app')
@section('title')
    Order Page
@endsection
@section('head')
    <style>

    </style>
@endsection
@section('content')
    <div class="container-fluid">
        {{--        <x-bread-crumb>--}}
        {{--            <li class="breadcrumb-item"><a href="{{route('product.create')}}">Products</a></li>--}}
        {{--            <li class="breadcrumb-item active" aria-current="page">Orders of {{\Illuminate\Support\Facades\Auth::user()->name}}</li>--}}
        {{--        </x-bread-crumb>--}}
        <div class="row">
            <form action="{{route('order.store')}}" method="post">
            <div class="col-12 col-sm-6 col-md-8 col-xl-10">

                <table class="table table-hover table-border justify-content-center">
                    <thead>
                    <tr>
                        <th scope="col">Particular</th>
                        <th scope="col">Amount (MMK)</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>Amount</td>
                        <td> {{$total}}</td>
                    </tr>
                    <tr>
                        <td>Delivery Services</td>
                        <td>
                            @if($total > 0)
                                5000
                            @else
                                0
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td>Total Amount</td>
                        <td>
                            @if($total > 0)
                                {{$total+5000}}
                                <input type="hidden" name="total" value="{{$total+5000}}">
                            @else
                                0
                            @endif
                        </td>
                    </tr>

                    </tbody>
                </table>
            </div>
                <div class="col-sm-6 col-md-8 col-xl-10">
                    <input type="tel" class="form-control mb-3" placeholder="Phone Number" autofocus name="phone">
                </div>
            <div class="col-sm-6 col-md-8 col-xl-10">
{{--                <form action="{{route('order-now.store')}}" method="post">--}}
                    @csrf
                    <div class="form-group">
                        <textarea name="address" id=""  placeholder="Enter your address" rows="5" class="form-control @error('address') is-invalid @enderror"></textarea>
                        @error("address")
                        <small class="text-danger">You need to fill address</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <h3><label for="pwd">Payment Method</label><br></h3>
                        <input type="radio" value="KBZ Payment" name="payment"> <span>KBZ Payment</span><br><br>
                        <input type="radio" value="Wave Payment" name="payment"> <span>Wave Payment</span><br><br>
                        <input type="radio" value="Banking Payment" name="payment"> <span>Banking Payment</span><br><br>
                    </div>
                    <button type="submit" class="btn btn-primary">Order Now</button>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('foot')
    <script>

    </script>
@endsection
