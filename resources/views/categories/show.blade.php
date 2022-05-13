@extends('blog-layouts.app')
@section('title')
    Create Category
@endsection
@section('content')
      <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">New message</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Recipient:</label>
                        <input type="text" class="form-control" id="recipient-name">
                    </div>
                    <div class="mb-3">
                        <label for="message-text" class="col-form-label">Message:</label>
                        <textarea class="form-control" id="message-text"></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Send message</button>
            </div>
        </div>
    </div>
</div>




      <div class="row justify-content-between custom-margin" id="card-style">
          @foreach($category->post as $item)
              <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3 col-xl-3 d-flex align-items-stretch">
                  <div class="card p-0 mb-3 animate__animated animate__backInLeft">
                      <div class="inner">
                          {{--                                <img class="card-img-top img-responsive w-100" src="" alt="Card image cap">--}}
                          <a class="venobox " data-gall="img{{ $item->id }}" href="{{asset('storage/product_photo/'.$item['gallery'])}}"><img src="{{asset('storage/product_photo/'.$item['gallery'])}}" class="w-100" alt="image alt"/></a>
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
                              <button class="animate__animated animate__fadeIn"><a href="{{route('welcome-detail',$item->id)}}" class=" mb-2 text-white text-nowrap align-items-center animate__animated animate__fadeIn">View Details</a></button>
                          </div>
                      </div>
                  </div>
              </div>
          @endforeach
      </div>
@endsection
@push("scripts")

@endpush

