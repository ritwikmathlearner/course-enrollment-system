@extends('layouts.app')

@section('content')
    <div class="d-flex flex-column justify-content-center align-items-center">
        <h1>All Available Courses</h1>
        <form action="{{ route('courses.index') }}" method="GET" class="w-50 mb-3">
            <div class="form-row">
                <div class="col-9">
                    <input type="text" id="term" name="term" class="form-control" value="{{ $term }}" placeholder="Search by course name">
                </div>
                <div class="col-3">
                    <button type="submit" class="btn btn-primary w-100">Search</button>
                </div>
            </div>
        </form>
        @php
            $counter = 0;
        @endphp
        @foreach($courses as $course)
            @if(!auth()->user()->courses->contains($course->id))
                <div class="w-50 border rounded p-2">
                    <h2>{{ $course->name }}</h2>
                    <p><strong>Instructor Name: </strong>{{ $course->user->name }}</p>
                    <p><strong>Classroom: </strong>{{ $course->class_room }}</p>
                    <p><strong>Semester: </strong>{{ $course->semester }}</p>
                    <p><strong>Time: </strong>{{ $course->time }}</p>
                    <form action="{{ route('course.enroll') }}" method="post">
                        @csrf
                        <input type="hidden" name="course_id" value="{{ $course->id }}">
                        <button type="submit" class="btn btn-success text-light">Enroll</button>
                    </form>
                </div>
                @php
                    $counter++;
                @endphp
            @endif
        @endforeach
        @if($counter == 0)
            <p class="w-50  text-center alert-danger p-3 rounded mt-4">No available course to show</p>
        @endif
    </div>
@endsection
