@extends('layouts.app')

@section('content')
    @if(auth()->user()->role == 0)
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-12 mb-2">
                    <div class="card bg-primary">
                        <div class="card-header">Category List</div>
                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif

                            <div class="text-center">
                                <a href="{{route("category.index")}}" style="color: white !important;"> View Details <span class="bg-dark rounded-circle p-2">{{\App\Models\Category::all()->count()}}</span></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-12 mb-2">
                    <div class="card bg-secondary">
                        <div class="card-header">Product List</div>
                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif
                            <div class="text-center">
                                <a href="{{route("post.index")}}" style="color: white !important;"> View Details <span class="bg-dark rounded-circle p-2">{{\App\Models\Post::all()->count()}}</span></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-12 mb-2">
                    <div class="card bg-success">
                        <div class="card-header">User List</div>
                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif
                            <div class="text-center">
                                <a href="{{route("user-manager.index")}}" style="color: white !important;"> View Details <span class="bg-dark rounded-circle p-2">{{ \App\Models\User::all()->count() }}</span></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-12 mb-2">
                    <div class="card bg-info">
                        <div class="card-header">All Orders</div>
                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif
                            <div class="text-center">

                                <a href="{{route("order.index")}}" style="color: white !important;"> View Details <span class="bg-dark rounded-circle p-2"> {{\App\Models\order::all()->count()}}</span></a>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-12 mb-2">
                    <div class="card bg-warning">
                        <div class="card-header">Post Comments</div>
                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif
                            <div class="text-center">
{{--                                {{dd($order)}}--}}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-12 mb-2">
                    <div class="card bg-light">
                        <div class="card-header text-nowrap">Skill Share Comments</div>
                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif
                            <div class="text-center">

                                <a href="{{route("skill-share-comment.index")}}" style="color: white !important;"> View Details <span class="bg-dark rounded-circle p-2">   {{ \App\Models\SkillShareComment::all()->count() }}</span></a>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-md-6">
                   <div class="card">
                       <div class="card-header">
                          <i class="fa fa-line-chart"></i> Post Line Chart
                       </div>
                       <div class="card-body">
                           <canvas id="myChart" width="400" height="400"></canvas>
                       </div>
                   </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <i class="fas fa-bar-chart"></i>Orders Chart
                        </div>
                        <div class="card-body">
                            <canvas id="myChart1" width="400" height="400"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @elseif(auth()->user()->role == 1)
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">{{ __('Dashboard') }}</div>

                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }} User
                                </div>
                            @endif
                            {{ __('You are logged in!') }} user1
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @elseif(auth()->user()->role == 2)
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">{{ __('Dashboard') }}</div>

                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }} User
                                </div>
                            @endif
                            {{ __('You are logged in!') }} user2
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection
@push("scripts")
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.1/chart.min.js"></script>

    <script>
        const ctx = document.getElementById('myChart');
        var _xdata= JSON.parse('{!! json_encode($monthCount) !!}');
        var _ydata= JSON.parse('{!! json_encode($months) !!}');
        const myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: _ydata,
                datasets: [{
                    label: _ydata,
                    data:_xdata,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });


        // ********************************************************
        const ctx1 = document.getElementById('myChart1');
        var _xorder= JSON.parse('{!! json_encode($dayCount) !!}');
        var _yorder= JSON.parse('{!! json_encode($days) !!}');
        const myChart1 = new Chart(ctx1, {
            type: 'bar',
            data: {
                labels: _yorder,
                datasets: [{
                    label: _yorder,
                    data: _xorder,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>

@endpush
