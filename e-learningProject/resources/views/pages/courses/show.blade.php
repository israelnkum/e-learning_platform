@extends('layouts.dash')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 text-right">
                <a href="{{route('courses.index')}}" class="btn btn-primary btn-sm mb-2" role="button">All Courses</a>
            </div>
            <div class="col-md-12">
                <div class="jumbotron" style="background: url('{{asset('cover_pics/'.$course->cover) }}') center center">
                    <h3 class="text-white mt-3 p-5" style="background: rgba(0,0,0,0.5)">{{$course->name}}</h3>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <a class="nav-item nav-link active" id="nav-overview-tab" data-toggle="tab" href="#nav-overview" role="tab" aria-controls="nav-overview" aria-selected="true">Overview</a>
                        <a class="nav-item nav-link" id="nav-course_content-tab" data-toggle="tab" href="#nav-course_content" role="tab" aria-controls="nav-course_content" aria-selected="false">Course Content</a>
                        <a class="nav-item nav-link" id="nav-quiz-tab" data-toggle="tab" href="#nav-quiz" role="tab" aria-controls="nav-quiz" aria-selected="false">Quiz(s)</a>
                        <a class="nav-item nav-link" id="nav-announcement-tab" data-toggle="tab" href="#nav-announcement" role="tab" aria-controls="nav-announcement" aria-selected="false">Announcement</a>
                    </div>
                </nav>
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-overview" role="tabpanel" aria-labelledby="nav-overview-tab">

                        <h5 class="mt-3">About this course</h5>
                        <ul class="list-group list-group-flush" >
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                By the Numbers
                                <ul class="list-unstyled">
                                    <li class="d-inline-block mr-5">
                                        Number of Students - {{$numberOfStudent}}
                                    </li>
                                    <li class="d-inline-block">
                                        <ul class="list-group list-group-flush" >
                                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                                Document
                                                <span  class="badge badge-primary badge-pill ml-2">{{$numberOfStudent}}</span>
                                            </li>
                                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                                Videos
                                                <span class="badge badge-primary badge-pill ml-2">{{$numberOfStudent}}</span>
                                            </li>
                                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                                Audios
                                                <span class="badge badge-primary badge-pill ml-2"   >{{$numberOfStudent}}</span>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Description
                                <span>
                                    {{$course->description}}
                                </span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Course Duration
                                <span>
                                    {{$course->duration}}
                                </span>
                            </li>
                        </ul>

                    </div>
                    <div class="tab-pane fade" id="nav-course_content" role="tabpanel" aria-labelledby="nav-course_content-tab">
                        <ul class="nav justify-content-end" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active text-dark" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Document</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Video</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Audio</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">11</div>
                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">22</div>
                            <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">33</div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="nav-quiz" role="tabpanel" aria-labelledby="nav-contact-quiz">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam amet architecto dignissimos eaque eos eum id illo in iure molestias nulla obcaecati, quaerat recusandae reprehenderit sint tenetur ullam voluptates voluptatum!
                    </div>
                    <div class="tab-pane fade" id="nav-announcement" role="tabpanel" aria-labelledby="nav-announcement-tab">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam amet architecto dignissimos eaque eos eum id illo in iure molestias nulla obcaecati, quaerat recusandae reprehenderit sint tenetur ullam voluptates voluptatum!
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
