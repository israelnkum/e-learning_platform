@extends('layouts.dash')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="bg-dark">
                    <h5 class="p-1 text-white">All Courses</h5>
                </div>
                <ul class="list-unstyled">
                    @foreach($courses as $course)
                        <li class="d-inline-block mb-3">
                            <div class="bg-dark text-white" style="width: 12rem;">
                                <img src="{{asset('cover_pics/'.$course->cover)}}" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">{{$course->name}}</h5>
                                    <p class="card-text">{{substr($course->description,0,40)}}...</p>
                                    <ul class="list-unstyled">
                                        <li class="d-inline-block">
                                            <form action="{{route('enrollment',$course->id)}}" method="post">
                                                @csrf
                                                <button title="Edit" type="submit" class="btn btn-sm btn-primary">
                                                    <i class="fa fa-edit"></i>
                                                </button>
                                            </form>
                                        </li>
                                        <li class="d-inline-block">
                                            <a role="button" title="Details" href="{{route('courses.show',$course->id)}}" class="btn btn-sm btn-info">
                                                <i class="fa fa-pencil"></i>
                                            </a>
                                        </li>
                                        <li class="d-inline-block">
                                            <button type="button" title="Upload file" value="{{$course->id}}" id="btn_upload{{$course->id}}" data-toggle="modal" data-target="#uploadFileModal" class="btn btn-sm btn-success">
                                                <i class="fa fa-upload"></i>
                                            </button>
                                        </li>
                                        <li class="d-inline-block">
                                            <form action="{{route('courses.destroy',$course->id)}}" method="post">
                                                @csrf
                                                {{method_field('delete')}}
                                                <button title="Delete Course" type="submit" class="btn btn-sm btn-danger">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>



    <!--upload file  Modal -->
    <div class="modal fade" id="uploadFileModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form action="{{route('uploadFile')}}" enctype="multipart/form-data" method="post" class="needs-validation" novalidate>
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Upload File(s)</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input  type="hidden" id="course_id" name="course_id" class="form-control">
                        <div class="form-group row">
                            <div class="col-md-12">
                                <input type="file" name="selected_files[]" id="selected_files" multiple class="form-control-file bg-dark text-white">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Upload</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    {{--End upload file modal--}}
@endsection
