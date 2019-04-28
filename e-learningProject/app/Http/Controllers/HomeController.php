<?php

namespace App\Http\Controllers;

use App\Course;
use App\Enrollment;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {


        $notEnrolled =[];

        $enrolledCourses = Enrollment::with('course')->where('user_id',Auth::user()->id)->get();

        foreach ($enrolledCourses as $enrolledCourse) {
            array_push($notEnrolled,$enrolledCourse->course->id);
        }

        $allCourses = Course::all()->whereNotIn('id',$notEnrolled);

//        $countCourses = Course::all()->count();

      //  return $countCourses;

        return view('home')
            ->with('allCourses',$allCourses)
            ->with('enrolledCourses',$enrolledCourses);
    }
}
