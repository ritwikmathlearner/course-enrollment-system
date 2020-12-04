@extends('layouts.app')

@section('content')
    <div class="d-flex flex-column justify-content-center align-items-start w-50 mx-auto">
        <h1>Course Name: {{ $course->name }}</h1>
        <h3>Enrolled Students</h3>
        <table class="table mt-3">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Letter Grade</th>
            </tr>
            </thead>
            <tbody>
            @forelse($students as $student)
                <tr>
                    <th scope="row" class="w-25">{{ $student->id }}</th>
                    <td class="w-25">{{ $student->name }}</td>
                    <td class="w-50">
                        <form action="{{route('course.grade')}}" method="post">
                            @csrf
                            <input type="hidden" name="course_id" value="{{$course->id}}">
                            <input type="hidden" name="student_id" value="{{$student->id}}">
                            <div class="form-row">
                                <div class="col-8">
                                    <select name="grade" id="grade" class="form-control">
                                        <option value="">Select grade</option>
                                        <option value="A" {{ $student->pivot->grades == 'A' ? 'selected' : '' }}>A
                                        </option>
                                        <option value="B" {{ $student->pivot->grades == 'B' ? 'selected' : '' }}>B
                                        </option>
                                        <option value="C" {{ $student->pivot->grades == 'C' ? 'selected' : '' }}>C
                                        </option>
                                        <option value="D" {{ $student->pivot->grades == 'D' ? 'selected' : '' }}>D
                                        </option>
                                        <option value="F" {{ $student->pivot->grades == 'F' ? 'selected' : '' }}>F
                                        </option>
                                    </select>
                                </div>
                                <div class="col-4">
                                    <button class="btn btn-success" type="submit">Submit</button>
                                </div>
                            </div>
                        </form>
                    </td>
                </tr>
            @empty
            </tbody>
        </table>
        <p class="w-50  text-center alert-danger p-3 rounded mt-4">You did not enroll to any course</p>
        @endforelse
    </div>
@endsection
