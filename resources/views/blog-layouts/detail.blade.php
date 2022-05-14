    @extends('blog-layouts.app')
@section("head")
    <style>
        #myStyle{
            background: var(--text-color);
            padding: 20px;
            box-shadow:inset 12px 12px 20px var(--nav-color);

        }
        .detail-img{
            object-fit: cover;
        }
        .detail-btn{
        var(--body-color);
            font-size: 1rem;
            padding: 8px;
            border-radius: 8px;

        }
        .detail-btn:hover{
            color: white !important;
        }
        #glow{
            position: relative;
            font-size: 1rem;
            color: white;
            letter-spacing:15px;
            text-transform: uppercase;
            width: 100%;
            text-align: center;
            -webkit-box-reflect: below 1px linear-gradient(transparent,#0004);
            line-height: 0.7em;
            outline: none;
            animation: animate 5s linear infinite;
        }
        @keyframes animate {
            0%,18%,20%,51%,60%,65%,80%,90%
            {
                color: #0e3742;
                text-shadow: none;
            }
            18.2%,20.2%,51.2%,60.2%,65.2%,80.2%,90.2%,100%{
                color: white;
                text-shadow: 0 0 10px white,
                0 0 20px red,
                0 0 40px red,
                0 0 80px red,
                0 0 160px red;
            }
        }

    </style>
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-md-6 align-items-stretch">
                {{--                <img class="detail-img w-100 h-75" src="{{asset('storage/product_photo/'.$product['gallery'])}}" alt="">--}}
                <a class="venobox detail-img" data-gall="img{{ $product->id }}" href="{{asset('storage/product_photo/'.$product['gallery'])}}">
                    <img src="{{asset('storage/product_photo/'.$product['gallery'])}}" class="w-100" alt="image alt"/>
                </a>
                <br><br>
               <div class="text-center">
                   <a class="go-back mb-3 text-center" href="/" id="glow">Go Back<<<</a>
               </div>
            </div>
            <div class="col-12 col-md-6 align-items-stretch" id="myStyle">
                <h2 class="detail-header text-center">{{$product['name']}}</h2>
                <h4 class="detail-body">Balance-       {{$product['balance']}}</h4>
                <h4 class="detail-body">Category-    {{$product->category->title}}</h4>
                <h4 class="detail-body" style="text-align: justify;text-indent: 50px;line-height: 1.5em" >Description- {{$product['description']}}</h4>
                <br>
                <br>
                <form action="{{route("cart.store")}}" method="POST">
                    @csrf

                    <input type="hidden" name="post_id" value="{{$product['id']}}">
                    <button class="btn detail-btn">Add to Cart</button>
                </form>
                <br>
                <br>
                @if(session('user'))
                    <button class="btn btn-success">Buy Now</button>
                @endif
                <br>
                <br>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-12">
                <div class="d-flex overflow-scroll border rounded me-2" style="height: 450px;">
                    @forelse($product->postGalleries as $gallery)
{{--                        <img src="{{asset('storage/postGalleries/'.$gallery->photo)}}" alt="" class="h-100 rounded me-2">--}}
                        <a class="venobox" data-gall="img{{ $product->id }}" href="{{asset('storage/postGalleries/'.$gallery->photo)}}">
                            <img src="{{asset('storage/postGalleries/'.$gallery->photo)}}" alt="" class="h-100 rounded me-2">
                        </a>

                        @can("delete",$gallery)
                            <form action="{{ route("postGallery.destroy",$gallery->id) }}" method="post">
                                @csrf
                                @method("DELETE")
                                <button class="btn btn-danger" style="margin-left:-50px">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </form>
                        @endcan
                    @empty
                        <p class="py-5"> Nothing to show relative image</p>
                    @endforelse
                </div>
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
                share: true,
                spinner: 'rotating-plane'
            });
        </script>
    @endpush
