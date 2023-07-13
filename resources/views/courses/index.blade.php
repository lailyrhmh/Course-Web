@php
    $i = 0;
@endphp

@extends('layout')

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <h2 class="text-center">Course Management Application</h2>
        </div>
        <div class="col-lg-12 text-center" style="margin-top:10px;margin-bottom: 10px;">
            <a class="btn btn-success " href="{{ route('courses.create') }}"> Add Course</a>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            {{ $message }}
        </div>
    @endif

    @if(sizeof($courses) > 0)
        <table class="table table-bordered">
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Description</th>
                <th>Duration</th>
                <th>Material</th>
                <th width="280px">Action</th>
            </tr>
            @foreach ($courses as $course)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $course->course_name }}</td>
                    <td>{{ $course->course_desc }}</td>
                    <td>{{ $course->course_duration }} hours</td>
                    <td>
                        <ul class="list-group">
                            @foreach($course->materials as $material)
                            <!-- <span class="label label-success">{{ $material->material_title }}</span> -->
                                <li class="list-group-item">{{ $material->material_title }}</li>
                            @endforeach
                        </ul>
                    </td>
                    <td>
                        <form action="{{ route('courses.destroy',$course->id) }}" method="POST">
                            <a class="btn btn-info" href="{{ route('courses.show',$course->id) }}">Show</a>
                            <a class="btn btn-primary" href="{{ route('courses.edit',$course->id) }}">Edit</a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
    @else
        <div class="alert alert-alert">Start Adding to the Database.</div>
    @endif
@endsection