@extends('layouts.app')
@section("title")
    List Of Products
@endsection

@section('content')
    <div class="container-fluid">
        <x-bread-crumb>
            <li class="breadcrumb-item active" aria-current="page">Products</li>
        </x-bread-crumb>
        <div class="row justify-content-center">
            <div class="col-12">
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
                    @foreach($data as $product)
                        <tr class="">
                            <td>{{$product->id}}</td>
                            <td>{{$product->name}}</td>
                            <td>{{$product->sale_price}}</td>
                            <td>{{$product->category->title}}</td>
                            <td>{{\Illuminate\Support\Str::substr($product->description,0,100)}}</td>
                            <td>  <img src="{{ asset('storage/product_photo/'.$product->gallery) }}" class="" style="width: 40px" alt=""></td>
                            <td>{{$product->balance}}</td>
                            <td class="d-flex">
                                <a href="{{ route('product.edit',$product->id) }}" class="btn btn-outline-primary btn-sm mr-1">
                                    <i class="feather-edit fa-fw"></i>
                                </a>
                                <form action="{{route('product.destroy',$product->id)}}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-outline-danger btn-sm">
                                        <i class="feather-delete fa-fw"></i>
                                    </button>
                                </form>
                            </td>
                            <td>{{$product->created_at}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            {{$data->links()}}
        </div>
    </div>
@endsection
@push('scripts')
@endpush
