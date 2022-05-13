@extends('layouts.app')
@section("head")
@endsection
@section("content")
    <div class="container">
        <div class="row">
            <div class="col-12">
                <table class="table table-bordered table-hover table-responsive mr-2">
                    <thead>
                    <tr class="text-center align-items-center justify-content-center">
                        <th>#</th>
                        <th>Order Date</th>
                        @if(auth()->user()->role == 0)
                        <th>Updated Date</th>
                        @endif
                        <th>Post Id</th>
                        <th>Post Image</th>
                        <th>User Id</th>
                        <th>Status</th>
                        <th>Phone</th>
                        <th>Address</th>
                        <th>Payment Method</th>
                        <th>Amount</th>

                    </tr>
                    </thead>
                    @forelse($orders as $order)
                            @if(auth()->user()->role == 0)
                            <tbody>
                            <tr>
                                <td>{{$order->id}}</td>
                                <td>
                                    {{$order->created_at->diffForHumans()}}
                                </td>
                                <td>{{$order->updated_at->diffForHumans()}}</td>
                                <td>
                                    {{$order->post->name}}
                                </td>
                                <td class="text-center">
                                    <a class="venobox" data-gall="img{{ $order->id }}" href="{{asset("storage/product_photo/".$order->post->gallery)}}">
                                        <img src="{{asset("storage/product_photo/".$order->post->gallery)}}" alt="" class="w-25">
                                    </a>
                                </td>
                                <td>{{$order->user->name}}</td>
                                <td class="d-flex justify-content-between">
                                    {{$order->status}}
                                    <a href="{{ route('order.edit',$order->id) }}" class="btn btn-outline-primary btn-sm">
                                        <i class="fas fa-edit fa-fw"></i>
                                    </a>
                                    <form action="{{route('order.destroy',$order->id)}}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-outline-danger btn-sm">
                                            <i class="fas fa-trash fa-fw"></i>
                                        </button>
                                    </form>
                                </td>
                                <td><a href="tel:{{$order->phone}}">{{$order->phone}}</a></td>
                                <td>{{$order->address}}</td>
                                <td>{{$order->payment_method}}</td>
                                <td>{{$order->amount}}</td>
                            </tr>
                            </tbody>
                            @else
                                    @if($order->user_id === auth()->id())
                                        <tbody>
                                        <tr>
                                            <td>{{$order->id}}</td>
                                            <td>{{$order->created_at}}</td>
                                            <td>{{$order->post->name}}</td>
                                            <td class="text-center">
                                                <a class="venobox" data-gall="img{{ $order->id }}" href="{{asset("storage/product_photo/".$order->post->gallery)}}">
                                                    <img src="{{asset("storage/product_photo/".$order->post->gallery)}}" alt="" class="w-25">
                                                </a>
                                            </td>
                                            <td>{{$order->user->name}}</td>
                                            <td>{{$order->status}}</td>
                                            <td><a href="tel:{{$order->phone}}">{{$order->phone}}</a></td>
                                            <td>{{$order->address}}</td>
                                            <td>{{$order->payment_method}}</td>
                                            <td>{{$order->amount}}</td>
                                        </tr>
                                        </tbody>
                                    @endif
                            @endif
                    @empty
                        <tr>
                            <td colspan="9" class="text-center font-weight-bold">There is no order in your order pages!</td>
                        </tr>
                    @endforelse

                </table>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        new VenoBox({
            selector: '.venobox',
            numeration: true,
            infinigall: true,
            share: false,
            spinner: 'rotating-plane'
        });
    </script>

@endpush
