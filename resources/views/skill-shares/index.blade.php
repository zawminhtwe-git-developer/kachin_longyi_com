@extends('layouts.app')
@section('head')
    {{--    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">--}}

    {{--    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">--}}

@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-4 col-md-6 col-12">
                <div ></div>
                @foreach($shareSkills as $shareSkill)
                    <div class="card mt-3">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            @if(\Illuminate\Support\Facades\Auth::user()->role==0)
                                <h4>{{\Illuminate\Support\Facades\Auth::user()->name}}'Skills Shared</h4>
                            @endif
                            <i class="fas fa-ellipsis-v"></i>
                        </div>
                        <div class="card-body w-100">

                            {!! $shareSkill->description !!}

                        </div>
                        <div class="card-footer d-flex justify-content-between align-items-center">
                            <span style="border: 1px solid silver; border-radius: 0.25em; padding: 0.5em;"> <i class="fas fa-thumbs-up fa-fw"></i><span class="badge bg-secondary">4</span></span>
                            <span style="border: 1px solid silver; border-radius: 0.25em; padding: 0.5em;"> <i class="fas fa-comment fa-fw" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasBottom{{$shareSkill->id}}" aria-controls="offcanvasBottom"></i><span class="badge bg-secondary">4</span></span>
                            <span style="border: 1px solid silver; border-radius: 0.25em; padding: 0.5em;"><i class="fas fa-share fa-fw"></i><span class="badge bg-secondary">4</span></span>
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
                                <div class="row">
                                    <div class="col-12">
                                        <h1 class="bg-primary text-center">{{$shareSkill->id}}</h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{--    comment stop --}}

                @endforeach
            </div>
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
