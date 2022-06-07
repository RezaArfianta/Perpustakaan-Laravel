@extends('layout.master')
     
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Data Rombel</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('studentGroups.create') }}"> Create</a>
            </div>
        </div>
    </div>
    <br>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <form class="form" method="get" action="{{ route('searchstudentgroups') }}">
    <div class="form-group w-75 mb-2 float-right">
        <input type="text" name="searchstudentgroups" class="form-control w-50 d-inline" placeholder="Search..." value="{{ request('searchstudentgroups') }}">
        <button type="submit" class="btn btn-primary mb-1">Search</button>
        <a class="btn btn-danger mb-1" href="{{ route('studentGroups.index') }}"> Refresh</a>

    </div>
    </form>
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Nama Rombel</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($studentGroups as $studentGroup)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $studentGroup->rombel }}</td>
            <td>
                <form action="{{ route('studentGroups.destroy',$studentGroup->id) }}" method="POST">
           
                    <a class="btn btn-primary" href="{{ route('studentGroups.edit',$studentGroup->id) }}">Edit</a>
     
                    @csrf
                    @method('DELETE')
        
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    {!! $studentGroups->links() !!}
        
@endsection