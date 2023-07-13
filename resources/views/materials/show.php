@extends('layout')

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <h2 class="text-center">Show Material</h2>
        </div>
        <div class="col-lg-12 text-center" style="margin-top:10px;margin-bottom: 10px;">
            <a class="btn btn-primary" href="{{ route('materials.index') }}"> Back</a>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Material Title : </strong>
                {{ $material->material_title }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Material Description : </strong>
                {{ $material->material_desc }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Link : </strong>
                {{ $material->material_link }}
            </div>
        </div>
    </div>
@endsection