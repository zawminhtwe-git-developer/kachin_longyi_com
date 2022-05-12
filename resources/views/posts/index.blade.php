@extends('layouts.app')
@section('title')
    List Category
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">List Category</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="d-flex justify-content-between">
                    <h4>
                        Category List
                    </h4>
                    <a href="{{ route('category.create') }}" class="btn btn-primary mb-2">Create New</a>
                </div>
                @if(session('status'))
                    <p class="alert alert-success">
                        {{ session('status') }}
                    </p>
                @endif
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Owner</th>
                        <th>Control</th>
                        <th>Created</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($categories as $category)
                        <tr>
                            <td>{{ $category->id }}</td>
                            <td>{{ $category->title }}</td>
                            <td>
                                {{ $category->user_id }}
                            </td>
                            <td class="text-nowrap">
                                <a href="{{ route('category.edit',$category->id) }}" class="btn btn-outline-warning">Edit</a>
                                <form action="{{ route('category.destroy',$category->id) }}" class="d-inline-block" method="post">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-outline-danger">Delete</button>
                                </form>
                                <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">Details</button>
                            </td>
                            <td>
                                <p class="small mb-0">
                                    <i class="fas fa-calendar"></i>
                                    {{ $category->created_at->format("Y-m-d") }}
                                </p>
                                <p class="mb-0 small">
                                    <i class="fas fa-clock"></i>
                                    {{ $category->created_at->format("H:i a") }}
                                </p>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{auth()->user()->name}}</h5>
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
@endsection


@section('script')

@endsection
