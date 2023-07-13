@php
    $i = 0;
@endphp

@extends('layout')

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <h2 class="text-center">Show Course</h2>
        </div>
        <div class="col-lg-12 text-center" style="margin-top:10px;margin-bottom: 10px;">
            <a class="btn btn-primary" href="{{ route('courses.index') }}"> Back</a>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Course Name : </strong>
                {{ $course->course_name }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Course Description : </strong>
                {{ $course->course_desc }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Duration : </strong>
                {{ $course->course_duration }}
            </div>
        </div>


        <div class="row">
            <div class="col-lg-12 text-center" style="margin-top:10px;margin-bottom: 10px;">
                <a class="btn btn-success " href="{{ route('courses.materials.create', ['course' => $course->id]) }}"> Add Material</a>
            </div>
        </div>

        @if($materials->count() > 0)
            <table class="table table-bordered">
                <tr>
                    <th>No</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Link</th>
                    <th width="280px">Action</th>
                </tr>
                @foreach ($course->materials as $material)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $material->material_title }}</td>
                    <td>{{ $material->material_desc }}</td>
                    <td>{{ $material->material_link }} hours</td>
                    <td>
                        <form action="{{ route('courses.materials.destroy', ['course' => $course->id, 'material' => $material->id]) }}" method="POST">
                            <a class="btn btn-primary" href="{{ route('courses.materials.edit', ['course' => $course->id, 'material' => $material->id]) }}">Edit</a>
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
    </div>
@endsection