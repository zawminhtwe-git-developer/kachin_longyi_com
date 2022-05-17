@extends('layouts.app')
@section('content')
       <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <?php
                        use App\Http\Controllers\CartController;
                        $total = CartController::cartItem();
                        ?>
                            Cart({{$total}})
                    </div>
                    <div class="card-body">
                        <table class="table table-responsive table-hover table-bordered text-center">
                            <tr>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Image</th>
                                <th>Controls</th>
                            </tr>
                            @forelse($carts as $cart)
                            <tr>
                                <td>
                                    {{$cart->name}}
                                </td>
                                <td>
                                    {{\Illuminate\Support\Str::substr($cart->description,1,300)}}...
                                </td>

                                <td>
                                    <a href="detail/{{$cart->id}}">
                                        <img class="trending-image" src="{{'storage/product_photo/'.$cart->gallery}}" style="height: 250px; width: 150px;" alt="">
                                    </a>
                                </td>
                                <td>

                                    <form action="{{route("cart.destroy",$cart->cart_id)}}" method="post">
                                        @csrf
                                        @method("DELETE")
                                        <button class="btn btn-danger text-nowrap">Remove From Cart</button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                                <td colspan="4" class="bg-danger text-white">There is nothing to show for choosing products</td>
                            @endforelse
                        </table>
                    </div>
                    <div class="card-footer">
                        <a class="btn btn-primary mt-3" href="{{route("order.create")}}">Order Now</a><br><br>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection


