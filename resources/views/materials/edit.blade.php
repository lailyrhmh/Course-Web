@extends('layout')

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <h2 class="text-center">Edit Material</h2>
        </div>
        <div class="col-lg-12 text-center" style="margin-top:10px;margin-bottom: 10px;">
            <a class="btn btn-primary" href="{{ route('courses.show', ['course' => $course_id]) }}"> Back</a>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('courses.materials.update', ['course' => $course_id, 'material' => $material->id]) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Material Title:</strong>
                    <input type="text" name="material_title" value="{{ $material->material_title }}" class="form-control" placeholder="Material Title">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Material Description:</strong>
                    <textarea class="form-control" name="material_desc" style="height:150px"  placeholder="Material Description">{{ $material->material_desc }}</textarea>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Link</strong>
                    <input type="text" name="material_link" class="form-control" style="height:150px" value="{{ $material->material_link }}"  placeholder="Link">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>

    </form>
@endsection