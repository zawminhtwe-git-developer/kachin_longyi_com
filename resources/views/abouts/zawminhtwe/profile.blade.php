@extends("layouts.app")
@section("title")
    Profile
@endsection
@section("content")
    <div class="container">
        <div class="row">
            <div class="col-12">
                <ul>
               @foreach($aboutzawminhtwes as $aboutzawminhtwe)
                    <li>{{$aboutzawminhtwe}}</li>
               @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection
