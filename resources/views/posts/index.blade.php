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
                        <th>Price</th>
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
                            <td>{{$product->price}}</td>
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
        <div class="row">
            <div class="row justify-content-between custom-margin" id="card-style">
                @foreach(\App\Models\Post::get() as $item)
                    <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3 col-xl-3 d-flex align-items-stretch">
                        <div class="card p-0 mb-3 animate__animated animate__backInLeft">
                            <div class="inner">
                                {{--                                <img class="card-img-top img-responsive w-100" src="" alt="Card image cap">--}}
                                <a class="venobox " data-gall="img{{ $item->id }}"
                                   href="{{asset('storage/product_photo/'.$item['gallery'])}}"><img
                                        src="{{asset('storage/product_photo/'.$item['gallery'])}}" class="w-100"
                                        alt="image alt"/></a>
                            </div>
                            <div class="card-body text-center">
                                <h3 class="card-title">
                                    Balance- ({{$item['balance']}})Package
                                </h3>
                                <i>(ဈေးနှုန်းအပြောင်းအလဲ ရှိနိုင်သည်)</i>
                                <p>{{$item['name']}}</p>
                                <p class="card-text ">
                                    {{\Illuminate\Support\Str::substr($item['description'],0,35)}}....
                                </p>
                            </div>
                            <div class="row">
                                <div class="text-center">
                                    <button class="btn btn-primary mb-2 animate__animated animate__fadeIn"><a
                                            href="{{route('welcome-detail',$item->id)}}"
                                            class=" mb-2 text-white text-nowrap align-items-center animate__animated animate__fadeIn">View
                                            Details</a></button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        @endsection
        @elseif(auth()->user()->role == 1)
            <h2>Rloe 1</h2>
    @endif
