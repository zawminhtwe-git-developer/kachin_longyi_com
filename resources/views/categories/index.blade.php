@extends('layouts.app')
@section('title')
    List Category
@endsection
@section('content')
    <div class="container-fluid">
        <x-bread-crumb>
{{--            <li class="breadcrumb-item"><a href="{{route('home')}}">Dashboard</a></li>--}}
            <li class="breadcrumb-item active" aria-current="page">View Category</li>
        </x-bread-crumb>
        <div class="row">
            <div class="col-12">
               <div class="card">
                   <div class="card-header d-flex justify-content-between">
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
                   </div>
                   <div class="card-body p-0">
                       <div style="overflow-x:auto;" class="mt-2">
                           <table class="table table-hover table-bordered table-responsive w-100 ">
                           <thead class="bg-primary text-white">
                           <tr>
                               <th>#</th>
                               <th>Title</th>
                               <th>Owner</th>
                               <th>Control</th>
                               <th>Created</th>
                           </tr>
                           </thead>
                           <tbody>
                           @forelse($categories as $category)
                               <tr>
                                   <td>{{ $category->id }}</td>
                                   <td>{{ $category->title }}</td>
                                   <td>
                                       @isset($category->getUser)
                                           {{$category->getUser->name}}
                                       @else
                                           UnKnown User
                                       @endisset
                                   </td>
                                   <td class="text-nowrap">
                                       <a href="{{ route('category.edit',$category->id) }}" class="btn btn-outline-warning">Edit</a>
                                       <form action="{{ route('category.destroy',$category->id) }}" class="d-inline-block"
                                             method="post">
                                           @csrf
                                           @method('delete')
                                           <button class="btn btn-outline-danger">Delete</button>
                                       </form>
                                       <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal"
                                               data-bs-target="#exampleModal{{$category->id }}" data-bs-whatever="@mdo">Details
                                       </button>
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
                               <!-- Modal start-->
                               <div class="modal fade" id="exampleModal{{$category->id }}" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                   <div class="modal-dialog">
                                       <div class="modal-content">
                                           <div class="modal-header">
                                               <h5 class="modal-title" id="exampleModalLabel">Category Title
                                                   >>> {{ $category->title }}</h5>
                                               <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                       aria-label="Close"></button>
                                           </div>
                                           <div class="modal-body">
                                               <h5>Category Owner >>> {{$category->user_id}}</h5>
                                           </div>
                                           <div class="modal-footer">
                                               <p class="mb-0 small">
                                                   <i class="fas fa-clock"></i>
                                                   {{ ($category->created_at)->diffForHumans()}}
                                               </p>
                                           </div>
                                       </div>
                                   </div>
                               </div>
                               <!-- Modal start-->

                           @empty
                               <tr>
                                   <td colspan="5" class="text-center">There is no Category</td>
                               </tr>
                           @endforelse
                           </tbody>
                       </table>
                       </div>
                   </div>
               </div>
            </div>
        </div>
    </div>


@endsection

@push("scripts")

@endpush

