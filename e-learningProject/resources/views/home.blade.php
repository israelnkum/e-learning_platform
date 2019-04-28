@extends('layouts.dash')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            @if(count($enrolledCourses)>0)
                <div class="col-md-10">
                    <div class="bg-dark">
                        <h5 class="p-1 text-white">Enrolled Courses</h5>
                    </div>
                    <ul class="list-unstyled">
                        @foreach($enrolledCourses as $enrolledCourse)
                            <li class="d-inline-block">
                                <div class="bg-dark text-white" style="width: 10rem;">
                                    <img src="{{asset('cover_pics/'.$enrolledCourse->course->cover)}}" class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title">{{$enrolledCourse->course->name}}</h5>
                                        <a role="button" href="{{route('courses.show',$enrolledCourse->id)}}" class="btn btn-sm btn-info">Go to course</a>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="col-md-10">
                <div class="bg-dark">
                    <h5 class="p-1 text-white">Available Courses</h5>
                </div>
                <ul class="list-unstyled">
                    @foreach($allCourses as $course)
                        <li class="d-inline-block">
                            <div class="bg-dark text-white" style="width: 15rem;">
                                <img src="{{asset('cover_pics/'.$course->cover)}}" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">{{$course->name}}</h5>
                                    <p class="card-text">{{$course->description}} .....</p>
                                    <ul class="list-unstyled">
                                        <li class="d-inline-block">
                                            <form action="{{route('enrollment',$course->id)}}" method="post">
                                                @csrf
                                                <button type="submit" class="btn btn-sm btn-danger">Enroll now!</button>
                                            </form>
                                        </li>
                                        <li class="d-inline-block">
                                            <a role="button" href="{{route('courses.show',$course->id)}}" class="btn btn-sm btn-info">Details</a>
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
@endsection
