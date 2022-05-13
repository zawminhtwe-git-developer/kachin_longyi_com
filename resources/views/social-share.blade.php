@extends("blog-layouts.app")
@section("content")
    <h2>Social Share Links</h2>
    <ul>
        @foreach($sharePage as $key => $value)
        <li>
            <a href="{{$value}}">{{$key}}</a>
        </li>
        @endforeach
    </ul>
    @endsection


