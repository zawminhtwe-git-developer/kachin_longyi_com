@extends('layouts.app')
@section('title')
    User Manager
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
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">User Manager</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">User Lists</div>
                    <div class="card-body">
                        <table class="table table-hover table-bordered w-100 table-responsive">
                            <thead class="bg-primary text-white">
                            <tr class="text-nowrap text-center">
                                <th>No</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Control</th>
                                <th>Created_at</th>
                                <th>Updated_at</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                <tr class="">
                                    <td>{{$user->id}}</td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->role}}</td>
                                    <td>
                                       @if($user->role == 0)
                                           <form class="d-inline-block" action="{{route('user-manager.makeAdmin')}}" id="form{{ $user->id }}" method="post"><!-- အပြင်ကကောင်နဲ့ချိတ်ဆက်ဖို့ အတွက် ‌ဖောင်ကို အိုင်ဒီပေးထားခြင်း    -->
                                                @csrf
                                                <input type="hidden" name="id" value="{{ $user->id }}">
                                                <button type="button" class="btn btn-sm btn-outline-primary" onclick="return askConfirm({{$user->id}})">Make Admin</button> <!--  ဒေတာသယ်ဆောင်သွားမည် type မှာ button ထားးမှာ အလုပ်တန်းမလုပ်မှာ   -->
                                            </form>
                                           @if($user->isBaned == 1)
                                                <span class="btn btn-outline-danger bg-danger text-white">Banned</span>
                                                @else
                                                <form class="d-inline-block" action="{{route('user-manager.ban')}}" id="banform{{ $user->id }}" method="post"><!-- အပြင်ကကောင်နဲ့ချိတ်ဆက်ဖို့ အတွက် ‌ဖောင်ကို အိုင်ဒီပေးထားခြင်း    -->
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{ $user->id }}">
                                                    <button type="button" class="btn btn-sm btn-outline-danger" onclick="return banConfirm({{$user->id}})">Ban User</button> <!--  ဒေတာသယ်ဆောင်သွားမည် type မှာ button ထားးမှာ အလုပ်တန်းမလုပ်မှာ   -->
                                                </form>
                                               @endif
                                        @endif
                                    </td>
                                    <td>{{$user->created_at}}</td>
                                    <td>{{$user->updated_at}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        function askConfirm(id){
            Swal.fire({
                title: 'Are you sure to upgrade role?',
                text: "You won't be able to revert this!",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#ed23ef',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Confirm!'
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire(
                        'Role Updated!',
                        'Your file has been Updated.',
                        'success'
                    )
                    setTimeout(function () {
                        $("#form"+id).submit(); //ခုနကဖောင်နှင့် ချိတ်ဆက်အသုံးပြုခြင်းဖြစ်သည်
                    },2000)
                }
            })
        }

        function banConfirm(id){
            Swal.fire({
                title: 'Are you sure to Ban user?',
                text: "You won't be able to revert this!",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#ed23ef',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Confirm!'
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire(
                        'Role Updated!',
                        'Your file has been Updated.',
                        'success'
                    )
                    setTimeout(function () {
                        $("#banform"+id).submit(); //ခုနကဖောင်နှင့် ချိတ်ဆက်အသုံးပြုခြင်းဖြစ်သည်
                    },2000)
                }
            })
        }
    </script>
@endpush
