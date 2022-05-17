@extends('layouts.app')
@section("title")
    List Of Products
@endsection
@if(auth()->user()->role == 0)
@section('content')
    <div class="container-fluid">
        <x-bread-crumb>
{{--            <li class="breadcrumb-item"><a href="{{route('post.create')}}">Products</a></li>--}}
            <li class="breadcrumb-item active" aria-current="page">Products</li>
        </x-bread-crumb>
        <div class="row justify-content-center" >
           <div class="d-flex justify-content-end">
               <a href="{{ route('post.create') }}" class="btn btn-primary mb-2">Create New</a>
           </div>
            <div class="col-12" style="overflow-x:auto;">
                <table class="table table-hover table-bordered table-responsive w-100 ">
                    <thead class="bg-primary text-white">
                    <tr class="text-nowrap text-center">
                        <th>No</th>
                        <th>Name</th>
                        <th>Purchase Price</th>
                        <th>Sale Price</th>
                        <th>Category</th>
                        <th>Description</th>
                        <th>Photo</th>
                        <th>Balance</th>
                        <th>Control</th>
                        <th>Created Date</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($data as $product)
                        <tr class="">
                            <td>{{$product->id}}</td>
                            <td>{{$product->name}}</td>
                            <td>{{$product->purchase_price}}</td>
                            <td>{{$product->sale_price}}</td>
                            <td>
{{--                                product talbe ကနေ category table ကို လှမ်းပြီးချိတ်ဆက်ယူထားခြင်း ဖြစ်ပါသည်။ အကယ်၍ category table ကိုမှားဖြတ်လိုက်ရင် --}}
                                @isset($product->category)
                                    {{$product->category->title}}
                                @else
                                    UnKnown Title
                                @endisset
                            </td>
                            <td>{{\Illuminate\Support\Str::substr($product->description,0,100)}}</td>
                            <td><img src="{{ asset('storage/product_photo/'.$product->gallery) }}" class=""
                                     style="width: 40px" alt=""></td>
                            <td>{{$product->balance}}</td>
                            <td class="d-flex mt-2">
                                <a href="{{ route('post.edit',$product->id) }}" class="btn btn-outline-primary btn-sm">
                                    <i class="fas fa-edit fa-fw"></i>
                                </a>
                                <form action="{{route('post.destroy',$product->id)}}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-outline-danger btn-sm">
                                        <i class="fas fa-trash fa-fw"></i>
                                    </button>
                                </form>
                            </td>
                            <td><p class="small mb-0">
                                    <i class="fas fa-calendar"></i>
                                    {{ $product->created_at->format("Y-m-d") }}
                                </p>
                                <p class="mb-0 small">
                                    <i class="fas fa-clock"></i>
                                    {{ $product->created_at->format("H:i a") }}
                                </p></td>
                        </tr>
                    @empty
                         <tr>
                             <td colspan="9" class="text-center fw-bold"> There is no data to show in your table!</td>
                         </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
            {{$data->links()}}
        </div>
    </div>
@endsection
@elseif(auth()->user()->role == 2)
@section('content')
    <div class="container">

            <div class="row justify-content-between" id="">
                @foreach(\App\Models\Post::get() as $item)
                    <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3 col-xl-3 d-flex align-items-stretch">
                        <div class="card mb-3 animate__animated animate__zoomIn">
                            <div class="inner w-100">
                                <a class="venobox" data-gall="img{{ $item->id }}" href="{{asset('storage/product_photo/'.$item['gallery'])}}">
                                    <img src="{{asset('storage/product_photo/'.$item['gallery'])}}" class="w-100" style="height: 100%" alt="image alt"/>
                                </a>
                            </div>
                            <div class="card-header">
                                <h4 class="text-center"><i><b>"{{$item['name']}}"</b></i></h4>
                            </div>
                            <div class="card-body">

                                <h4>Price - (<i><b>{{$item['sale_price']}}</b></i>) MMK</h4>
                                <hr>
                                <h4 class="card-title">
                                    Balance- (<i><b>{{$item['balance']}}</b></i>)Package
                                </h4>
                                <hr>
                                <p class="card-text ">
                                    {{\Illuminate\Support\Str::substr($item['description'],0,70)}}.... <a href="{{route('welcome-detail',$item->id)}}" class="text-black-50"><small>read more</small></a>
                                </p>
                            </div>
                            <div class="row">
                                <div class="text-center d-flex justify-content-between p-3">
                                    <div>
                                        <button class="btn btn-outline-primary animate__fadeIn"><a href="{{route('welcome-detail',$item->id)}}" class=" mb-2 text-nowrap align-items-center animate__animated animate__fadeIn">View Details</a></button>
                                    </div>
                                    <div>
                                        <form action="{{route("cart.store")}}" method="POST">
                                            @csrf

                                            <input type="hidden" name="post_id" value="{{$item['id']}}">
                                            <button class="btn btn-outline-success mb-2 text-nowrap align-items-center animate__animated animate__fadeIn"><i class="fas fa-cart-plus">Add to Cart</i></button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

        @endsection
        @elseif(auth()->user()->role == 1)
            <h2>Rloe 1</h2>
    @endif
