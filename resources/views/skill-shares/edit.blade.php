@extends('layouts.app')
@section("title")
    Skill Shares
@endsection
@section('head')
    {{--    <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">--}}
    {{--    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">--}}
@endsection
@section('content')
    <div class="row py-4"></div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div ></div>
                <div class="card">
                    <div class="card-header">
                        <h4>Share Skills</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('shareSkill.update',$shareSkill->id) }}" method="post" id="create_category">
                            @csrf
                            @method("PUT")
                            <div class="mb-3">
                                <div class="row">
                                    <div class="col-12">
                                      <textarea type="text" class="form-control @error('description') is-invalid @enderror"
                                                name="description" id="summernote">{{$shareSkill->description}}</textarea>
                                        @error('description')
                                        <p class="small text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer">
                        <div class="col-3">
                            <button class="btn btn-primary" form="create_category">Update</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section("foot")
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    {{--    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>--}}
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#summernote').summernote({
                placeholder: 'Share For You',
                tabsize: 2,
                height: 100
            });
        });
    </script>
@endsection

