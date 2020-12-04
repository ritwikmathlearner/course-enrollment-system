<?php

namespace App\Http\Controllers;

use App\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CourseController extends Controller
{

    public function index(Request $request)
    {
        if ($request->term != null) {
            $courses = Course::where('name', 'like', "%{$request->term}%")->get();
            $term = $request->term;
        } else {
            $courses = Course::all();
            $term = null;
        }
        return view('courses.index', compact('courses', 'term'));
    }

    public function studentCourses()
    {
        $courses = auth()->user()->courses;
        return view('courses.enrolled', compact('courses'));
    }

    public function instructorCourses()
    {
        $courses = auth()->user()->courses;
        return view('courses.instruct', compact('courses'));
    }

    public function withdraw(Request $request)
    {
        auth()->user()->courses()->detach($request->course_id);
        return back();
    }

    public function enroll(Request $request)
    {
        auth()->user()->courses()->attach($request->course_id);
        return back();
    }

    public function enrolledStudents(Request $request)
    {
        $course = Course::find($request->course_id);
        $students = $course->users;
        return view('courses.students', compact('students', 'course'));
    }

    public function grade(Request $request)
    {
        $updateArr = [
            'grades' => $request->grade
        ];
        DB::table('course_user')->where('user_id', $request->student_id)->where('course_id', $request->course_id)->update($updateArr);
        return back();
    }
}
