@extends('blog-layouts.app')
@section('head')
    {{--    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">--}}

    {{--    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">--}}
    <style>
        body{margin-top:20px;}

        .comment-wrapper .panel-body {
            max-height:650px;
            overflow:auto;
        }

        .comment-wrapper .media-list .media img {
            width:64px;
            height:64px;
            border:2px solid #e5e7e8;
        }

        .comment-wrapper .media-list .media {
            border-bottom:1px dashed #efefef;
            margin-bottom:25px;
        }
        /*li a{*/
        /*    background-color: white !important;*/
        /*    color: black;*/
        /*}*/
    </style>
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            @foreach($shareSkills as $shareSkill)
            <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3 d-flex align-items-lg-stretch align-items-md-stretch">

                    <div class="card mt-3" id="shareSkill{{$shareSkill->id}}">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            @if(auth()->user())
                                @if(\Illuminate\Support\Facades\Auth::user()->role==0)
                                    <h4>{{\Illuminate\Support\Facades\Auth::user()->name}}'Skills Shared</h4>
                                    <!-- Default dropstart button -->
                                    <div class="btn-group dropstart">
                                        <i type="button" class="fas fa-ellipsis-v" data-bs-toggle="dropdown" aria-expanded="false">
                                        </i>
                                        <ul class="dropdown-menu text-center">
                                            <li>
                                                <button class="btn btn-outline-primary">
                                                    <a href="{{route("shareSkill.edit",$shareSkill->id)}}" style="background-color: white;color:black;"><i class="fas fa-edit">   Edit</i></a>
                                                </button>
                                            </li>
                                            <hr>
                                            <li>
                                                <form action="{{route("shareSkill.destroy",$shareSkill->id)}}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <button class="btn btn-outline-danger btn-sm">
                                                        <i class="fas fa-trash mr-2">   Delete</i>
                                                    </button>
                                                </form>
                                            </li>
                                        </ul>
                                    </div>
                                    @elseif(auth()->user()->role == 2)
                                    Admin Skill Shared
                                @endif
                            @else
                                Admin Skill Shared
                            @endif

                        </div>
                        <div class="card-body w-100">

                            {!! $shareSkill->description !!}

                        </div>
                        <div class="card-footer d-flex justify-content-between align-items-center">
                            <span style="border: 1px solid silver; border-radius: 0.25em; padding: 0.5em;" class="d-flex justify-content-center align-items-center">
                             <form action="{{route("like.store")}}" method="post">
                                 @csrf
                                @if(auth()->user())
                                     <input type="hidden" name="user_id" value="{{auth()->user()->id}}">
                                @endif
                                 <input type="hidden" name="share_skills_id" value="{{$shareSkill->id}}">
                                 <button class="btn btn-sm">
                                     <i class="fas fa-thumbs-up fa-fw"></i>
                                 </button>
                             </form>
                                <span class="badge bg-secondary py-2">
                                {{\App\Models\skillShareLike::where("share_skills_id", $shareSkill->id)->count()}}
                                </span>
                            </span>
                            <span style="border: 1px solid silver; border-radius: 0.25em; padding: 0.5em;" class="d-flex justify-content-center align-items-center">
                                <button class="btn btn-sm">
                                    <i class="fas fa-comment fa-fw" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasBottom{{$shareSkill->id}}" aria-controls="offcanvasBottom"></i>
                                </button>
                                <span class="badge bg-secondary py-2">{{ \App\Models\SkillShareComment::where("share_skills_id",$shareSkill->id)->count() }}</span>
                            </span>
                            <span style="border: 1px solid silver; border-radius: 0.25em; padding: 0.5em;" class="d-flex justify-content-center align-items-center">
                                <button class="btn btn-sm">
                                    <i class="fas fa-share fa-fw"></i>
                                </button>
                                <span class="badge bg-secondary py-2">
                                    0
                                </span></span>
                        </div>
                    </div>

                    {{--    comment start --}}
                    <div class="offcanvas offcanvas-bottom" tabindex="-1" id="offcanvasBottom{{$shareSkill->id}}" aria-labelledby="offcanvasBottomLabel">
                        <div class="offcanvas-header">
                            <h5 class="offcanvas-title" id="offcanvasBottomLabel">Public Comments</h5>
                            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                        </div>
                        <div class="offcanvas-body small">
                            <div class="container">
                                <div class="row bootstrap snippets bootdeys">
                                    <div class="col-md-6 col-sm-12">
                                            <div class="card mt-3">
                                                <div class="card-header d-flex justify-content-between align-items-center">
                                                        @if(auth()->user())
                                                            @if(\Illuminate\Support\Facades\Auth::user()->role==0)
                                                                <h4>{{\Illuminate\Support\Facades\Auth::user()->name}}'Skills Shared</h4>
                                                                <!-- Default dropstart button -->
                                                                <div class="btn-group dropstart">
                                                                    <i type="button" class="fas fa-ellipsis-v" data-bs-toggle="dropdown" aria-expanded="false">
                                                                    </i>
                                                                    <ul class="dropdown-menu text-center">
                                                                        <li>
                                                                            <button class="btn btn-outline-primary">
                                                                                <a href="{{route("shareSkill.edit",$shareSkill->id)}}" style="background-color: white;color:black;"><i class="fas fa-edit">   Edit</i></a>
                                                                            </button>
                                                                        </li>
                                                                        <hr>
                                                                        <li>
                                                                            <form action="{{route("shareSkill.destroy",$shareSkill->id)}}" method="post">
                                                                                @csrf
                                                                                @method('delete')
                                                                                <button class="btn btn-outline-danger btn-sm">
                                                                                    <i class="fas fa-trash mr-2">   Delete</i>
                                                                                </button>
                                                                            </form>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                                @elseif(auth()->user()->role == 2)
                                                                    Admin Skill Shared
                                                            @endif
                                                        @endif
                                                   @guest()
                                                            Admin Skill Shared
                                                   @endguest
                                                </div>
                                                <div class="card-body w-100">
                                                    {!! $shareSkill->description !!}
                                                </div>
                                            </div>
                                    </div>

                                        <div class="col-md-6 col-sm-12">
                                            <div class="comment-wrapper">
                                                <div class="panel panel-info">
                                                    <div class="panel-heading">
                                                        Comment panel
                                                    </div>
                                                    <div class="panel-body">
                                                        @auth()
                                                        <form action="{{route('skill-share-comment.store')}}" method="post">
                                                            @csrf
                                                            <input type="hidden" name="share_skills_id" value="{{$shareSkill->id}}">
                                                            <input type="hidden" name="user_id" value="{{ \Illuminate\Support\Facades\Auth::id() }}">
                                                            <textarea class="form-control" placeholder="write a comment..." rows="3" name="comment"></textarea>
                                                            <br>
                                                            <button class="btn btn-primary pull-right">Comment</button>
                                                        </form>
                                                        @endauth
                                                        <div class="clearfix"></div>
                                                        <hr>
                                                        <ul class="media-list">
{{--                                                            @if(auth()->user())--}}
                                                                @foreach( \App\Models\SkillShareComment::latest()->get() as $SkillShareComment)
                                                                    @if($SkillShareComment->share_skills_id == $shareSkill->id)
                                                                        <li class="media">
                                                                            <a href="#" class="pull-left">
                                                                                {{--                                                                                <img src="{{$SkillShareComment->user_id == auth()->user()->id ? asset('storage/profile/'.$SkillShareComment->user->photo) : asset('images/logo/me.jpg')}}" class="img-circle" />--}}
                                                                                <img src="{{isset(Auth::user()->photo)? asset('storage/profile/'.$SkillShareComment->user->photo) : asset('images/logo/me.jpg')}}" class="img-circle" />
                                                                            </a>
                                                                            <div class="media-body">
                                                                        <span class="text-muted pull-right">
                                                                            <small class="text-muted">{{ $SkillShareComment->created_at->diffForHumans() }}</small>
                                                                        </span>
                                                                                <strong class="text-success">{{ $SkillShareComment->user->name }}</strong>
                                                                                <p>
                                                                                    {{$SkillShareComment->comment}}
                                                                                </p>
                                                                            </div>
                                                                        </li>
                                                                    @endif
                                                                @endforeach
{{--                                                            @endif--}}
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    {{--    comment stop --}}
            </div>
            @endforeach
        </div>
    </div>

@endsection
@push('scripts')
    <script>
        // $('#summernote').summernote({
        //     placeholder: 'Share For You',
        //     tabsize: 2,
        //     height: 100
        // });
    </script>
@endpush
