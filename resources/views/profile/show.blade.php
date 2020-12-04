@extends('layouts.app')

@section('content')
    <div class="w-50 mx-auto border rounded p-3">
        <div class="d-flex align-items-center">
            <h2 class="mr-auto">{{ $user->name }}</h2>
            @if(auth()->user()->type == 0)
                <a href="/student/courses" class="btn btn-success">Enrolled Courses</a>
            @else
                <a href="/instructor/courses" class="btn btn-success">Enrolled Courses</a>
            @endif
        </div>
        <hr>
        <p>
            <strong>Birthdate: </strong>{{ $user->birth_date != null ? \Carbon\Carbon::parse($user->birth_date)->format('d/m/Y') : 'Please edit' }}
        </p>
        <p><strong>Gender: </strong>{{ ucwords($user->gender) }}</p>
        <p><strong>Email: </strong>{{ $user->email }}</p>
        <a href="/profile/edit" class="btn btn-info text-light">Edit Profile</a>
    </div>
@endsection
