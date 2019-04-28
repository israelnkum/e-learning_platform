<?php

namespace App\Http\Controllers;

use App\Course;
use App\Enrollment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = Course::all();
        $countCourses = Course::all()->count();


        //return $levels;
        return view('pages.courses.index')
            ->with('courses',$courses)
            ->with('countCourses',$countCourses);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $course = new Course();
        $course->user_id= Auth::user()->id;
        $course->name=$request->input('subject_name');
        $course->description=$request->input('description');
        $course->duration="Month";


        if ($request->hasFile('cover')) {
            $file = $request->file('cover');
            $extension = $file->getClientOriginalExtension();
            $files = $file->getClientOriginalName();
            $fileName = $files . '_' . time() . '.' . $extension;
            $file->move(public_path('cover_pics'), $fileName);

            $course->cover = $fileName;
        }
        $course->save();
        return redirect('/courses')
            ->with('success','Course added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $course = Course::find($id);

        $numberOfStudent =Enrollment::where('course_id',$id)->get()->count();
        return view('pages.courses.show')
            ->with('course',$course)
            ->with('numberOfStudent',$numberOfStudent);
    }



    public function enrollment($id){
        $enrollment = new Enrollment();

        $enrollment ->course_id=$id;
        $enrollment->user_id = Auth::user()->id;

        $enrollment->save();

        return redirect()->route('courses.show',['id'=>$id]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }


    public function uploadFile(Request $request){

        // dd($request->file('selected_files'));

        for ($i=0; $i<count($request->file('selected_files'));$i++){
            $file = $request->file('selected_files')[$i];
            $extension = $file->getClientOriginalExtension();
            $files = $file->getClientOriginalName();
            $fileName = $files . '_' . time() . '.' . $extension;


            strtolower($extension);
            if ($extension == 'mp4' || $extension == 'avi' || $extension == 'flv' || $extension == 'mov'){
                $file->move(public_path('uploaded_files/audio'), $fileName);
            }elseif ($extension == 'doc' || $extension == 'docx' || $extension == 'pdf' || $extension == 'odt' || $extension == 'xls' || $extension == 'xlsx' || $extension == 'ods' || $extension == 'ppt' || $extension == 'pptx' || $extension == 'txt'){
                $file->move(public_path('uploaded_files/document'), $fileName);
            }elseif ($extension == 'mp3' || $extension == 'wma' || $extension == 'wav'){
                $file->move(public_path('uploaded_files/video'), $fileName);
            }

        }

        return redirect('/courses')
            ->with('success','Files uploaded successfully');;
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
