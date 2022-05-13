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
                <x-bread-crumb>
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Products</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Orders of {{\Illuminate\Support\Facades\Auth::user()->name}}</li>
                </x-bread-crumb>
        <div class="row">
            <div class="col-12">
                <form action="{{route('order.update',$order->id)}}" method="post">
                    @csrf
                    @method("PUT")
                <div class="card">
                    <div class="card-header">
                        <h3 class="text-primary">Consignation</h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">Post ID</label>
                            <input type="hidden" class="form-control" name="post_id" id="name" aria-describedby="emailHelp" value="{{$order->post_id}}">
                            <input type="text" class="form-control" id="name" aria-describedby="emailHelp" value="{{$order->post->name}}" disabled>
                        </div>
                        <div class="form-group">
                            <label for="name">Customer Name</label>
                            <input type="hidden" class="form-control" name="user_id" id="name" aria-describedby="emailHelp" value="{{$order->user_id}}">
                            <input type="text" class="form-control" id="name" aria-describedby="emailHelp" value="{{$order->user->name}}" disabled>
                        </div>
                        <div class="form-group">
                            <label for="name">Status</label>
                            <input type="text" class="form-control" name="status" id="name" aria-describedby="emailHelp" value="{{$order->status}}">
                            @error("status")
                            <small class="text-danger font-weight-bold">{{ $message }}</small>
                            @enderror
                            @if ($errors->has('status'))
                                <span class="text-danger">{{ $errors->first('status') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="name">Phone</label>
                            <input type="text" class="form-control" name="phone" id="name" aria-describedby="emailHelp" value="{{$order->phone}}">
                            @error("phone")
                            <small class="text-danger font-weight-bold">{{ $message }}</small>
                            @enderror
                            @if ($errors->has('phone'))
                                <span class="text-danger">{{ $errors->first('phone') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="name">Address</label>
                            <input type="text" class="form-control" name="address" id="name" aria-describedby="emailHelp" value="{{$order->address}}">
                            @error("address")
                            <small class="text-danger font-weight-bold">{{ $message }}</small>
                            @enderror
                            @if ($errors->has('address'))
                                <span class="text-danger">{{ $errors->first('address') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="name">Payment Method</label>
                            <input type="text" class="form-control" name="payment_method" id="name" aria-describedby="emailHelp" value="{{$order->payment_method}}">
                            @error("payment_method")
                            <small class="text-danger font-weight-bold">{{ $message }}</small>
                            @enderror
                            @if ($errors->has('payment_method'))
                                <span class="text-danger">{{ $errors->first('payment_method') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="name">Amount</label>
                            <input type="text" class="form-control" name="amount" id="name" aria-describedby="emailHelp" value="{{$order->amount}}">
                            @error("amount")
                            <small class="text-danger font-weight-bold">{{ $message }}</small>
                            @enderror
                            @if ($errors->has('amount'))
                                <span class="text-danger">{{ $errors->first('amount') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="name">Delivery Date</label>
                            <input type="datetime-local" class="form-control" name="updated_at" id="name" aria-describedby="emailHelp" value="{{$order->updated_at}}">
                            @error("updated_at")
                            <small class="text-danger font-weight-bold">{{ $message }}</small>
                            @enderror
                            @if ($errors->has('updated_at'))
                                <span class="text-danger">{{ $errors->first('updated_at') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-primary">Update</button>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('foot')
    <script>

    </script>
@endsection
