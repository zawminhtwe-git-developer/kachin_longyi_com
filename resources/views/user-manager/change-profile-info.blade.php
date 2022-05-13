@extends('layouts.app')
@section('title')
    Change Profile Info
@endsection
@section('head')
    <style>

    </style>
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Change User Information </li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="row">
            {{--//start admin profile--}}
                <div class="col-12 col-md-6 mb-2">
                <div class="card">
                    <div class="card-body">
                        <div class="text-center">
                            <img src="{{isset(Auth::user()->photo)?asset('storage/profile/'.Auth::user()->photo) : asset('images/logo/me.jpg')}}" class="w-50 rounded-circle my-3" alt="">
                            <h3>
                                {{Auth::user()->name}}
                            </h3>
                            <small>
                                {{Auth::user()->email}}
                            </small>
                        </div>
                    </div>
                </div>
            </div>
            {{--//stop admin profile--}}

            {{--            //start admin photo change--}}
                <div class="col-12 col-md-6 mb-2 align-items-stretch">
                <div class="card">
                    <div class="card-body">
                        <img src="{{isset(Auth::user()->photo)? asset('storage/profile/'.Auth::user()->photo) : asset('images/logo/me.jpg')}}" alt="" style="width:280px">

                        <form action="{{route('user-manager.changePhoto')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="photo">
                                    <i class="mr-1 feather-image"></i>
                                    Change Profile Photo
                                </label>
                                <input type="file" name="photo" id="photo" class="form-control p-1 mr-2 overflow-hidden" required>
                            </div>
                            <button type="submit" class="btn btn-primary mt-2">
                                <i class="bi bi-upload mr-1"></i>
                            </button>

                        </form>
                        @error("photo")
                        <small class="font-weight-bold text-danger text-center">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
            </div>
            {{--            //stop photo change--}}

            {{--            //start admin password change--}}
                <div class="col-12 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <form action="{{route('user-manager.changePassword')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="">
                                    <i class="mr-1 bi bi-lock"></i>
                                    Current-Password
                                </label>
                                <input type="password" name="current_password" class="form-control" placeholder="Current Password">
                                @error('current_password')
                                <small class="font-weight-bold text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="current">
                                    <i class="mr-1 feather-refresh-ccw">
                                    </i>
                                    Change Passsword
                                </label>
                                <input type="password" name="new_password" class="form-control" id="current" placeholder="New Password">
                                @error('new_password')
                                <small class="text-weight-bold text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="repeat">
                                    <i class="mr-1 feather-check"></i>
                                    Confirm Password
                                </label>
                                <input type="password" name="new_confirm_password" class="form-control" id="repeat" placeholder="Confirm Password">
                                @error("new_confirm_password")
                                <small class="font-weight-bold text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="customSwitch2" required>
                                    <label class="custom-control-label mr-1" for="customSwitch2" required>I'm Sure</label>
                                </div>
                                <button type="submit" class="btn btn-primary mt-2">
                                    <i class="mr-2 feather-refresh-ccw"></i>
                                    Change Password
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            {{--            //stop admin password change--}}

            {{--            //start admin name email change--}}
            <div class="mt-2 col-12 col-md-6">
                <div class="card mb-2">
                    <div class="card-body">
                        <form action="{{ route('user-manager.changeName') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="email">
                                    <i class="mr-1 feather-user"></i>
                                    Your Name
                                </label>
                                <input type="text" name="name" class="form-control" value="{{ auth()->user()->name }}">
                                @error("name")
                                <small class="font-weight-bold text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="d-flex justify-content-between align-items-center">
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="customSwitch1" required>
                                    <label class="custom-control-label" for="customSwitch1">I'm Sure</label>
                                </div>
                                <button type="submit" class="btn btn-primary mt-2">
                                    <i class="mr-1 feather-refresh-ccw"></i>
                                    Change Name
                                </button>
                            </div>
                        </form>

                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('user-manager.changeEmail') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="email">
                                    <i class="mr-1 feather-mail"></i>
                                    Your Email
                                </label>
                                <input type="text" name="email" class="form-control" value="{{ auth()->user()->email }}">
                                @error("email")
                                <small class="font-weight-bold text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="d-flex justify-content-between align-items-center">
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="customSwitch3" required>
                                    <label class="custom-control-label" for="customSwitch3">I'm Sure</label>
                                </div>
                                <button type="submit" class="btn btn-primary mt-2">
                                    <i class="mr-1 feather-refresh-ccw"></i>
                                    Change Email
                                </button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
            {{--            //start admin name email change--}}
        </div>

        <div class="row">

        </div>

    </div>
@endsection

