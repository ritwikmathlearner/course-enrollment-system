@extends('layouts.app')

@section('content')
    <div class="d-flex flex-column justify-content-center align-items-center">
        <h1>Enrolled Courses List</h1>
        @forelse($courses as $course)
            <div class="w-50 border rounded p-2">
                <h2>{{ $course->name }}</h2>
                <p><strong>Instructor Name: </strong>{{ $course->user->name }}</p>
                <p><strong>Classroom: </strong>{{ $course->class_room }}</p>
                <p><strong>Semester: </strong>{{ $course->semester }}</p>
                <p><strong>Time: </strong>{{ $course->time }}</p>
                <form action="{{ route('course.withdraw') }}" method="post">
                    @csrf
                    <input type="hidden" name="course_id" value="{{ $course->id }}">
                    <button type="submit" class="btn btn-danger text-light">Withdraw</button>
                </form>
            </div>
        @empty
            <p class="w-50  text-center alert-danger p-3 rounded mt-4">You did not enroll to any course</p>
        @endforelse
    </div>
@endsection
