@extends('layout')

@section('materials')

    <div class="row">
        <div class="col-lg-12">
            <h2 class="text-center">Material Management Application</h2>
        </div>
        <div class="col-lg-12 text-center" style="margin-top:10px;margin-bottom: 10px;">
            <a class="btn btn-success " href="{{ route('materials.create') }}"> Add Material</a>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            {{ $message }}
        </div>
    @endif

    @if(sizeof($materials) > 0)
        <table class="table table-bordered">
            <tr>
                <th>No</th>
                <th>Title</th>
                <th>Description</th>
                <th>Link</th>
                <th width="280px">Action</th>
            </tr>
            @foreach ($materials as $material)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $material->material_title }}</td>
                    <td>{{ $material->material_desc }}</td>
                    <td>{{ $material->material_link }} hours</td>
                    <td>
                        <form action="{{ route('materials.destroy',$material->id) }}" method="POST">
                            <a class="btn btn-info" href="{{ route('materials.show',$material->id) }}">Show</a>
                            <a class="btn btn-primary" href="{{ route('materials.edit',$material->id) }}">Edit</a>
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

    {!! $materials->links() !!}

@endsection