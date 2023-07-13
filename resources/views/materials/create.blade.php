@extends('layout')

@section('content')

<div class="row">
    <div class="col-lg-12">
        <h2 class="text-center">Add Material</h2>
    </div>
    <div class="col-lg-12 text-center" style="margin-top:10px;margin-bottom: 10px;">
        <a class="btn btn-primary" href="{{ route('courses.show', ['course' => $course->id]) }}"> Back</a>
    </div>
</div>

@if ($errors->any())
<div class="alert alert-danger">
    <strong>Oops!</strong> There were some problems with your input.<br><br>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form action="{{ route('courses.materials.store', ['course' => $course->id]) }}" method="POST">
    @csrf

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Material Title:</strong>
                <input type="text" name="material_title" class="form-control" placeholder="Material Title">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Material Description:</strong>
                <textarea class="form-control" style="height:150px" name="material_desc" placeholder="Material Description"></textarea>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Link</strong>
                <input type="text" class="form-control" name="material_link" placeholder="Link">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>

</form>
@endsection