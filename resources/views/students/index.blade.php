@extends('layout.master')
     
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Data Siswa</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('students.create') }}"> Create</a>
            </div>
        </div>
    </div>
    <br>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <form class="form" method="get" action="{{ route('searchstudents') }}">
    <div class="form-group w-75 mb-2 float-right">
        <input type="text" name="searchstudents" class="form-control w-50 d-inline" placeholder="Search..." value="{{ request('searchstudents') }}">
        <button type="submit" class="btn btn-primary mb-1">Search</button>
        <a class="btn btn-danger mb-1" href="{{ route('students.index') }}"> Refresh</a>
    </div>
    </form>
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Nis</th>
            <th>Nama</th>
            <th>Rombel</th>
            <th>Rayon</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($students as $student)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $student->nis }}</td>
            <td>{{ $student->nama }}</td>
            <td>{{ $student->rombel }}</td>
            <td>{{ $student->rayon }}</td>
            <td>
                <form action="{{ route('students.destroy',$student->id) }}" method="POST">
           
                    <a class="btn btn-primary" href="{{ route('students.edit',$student->id) }}">Edit</a>
     
                    @csrf
                    @method('DELETE')
        
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    
    
    {!! $students->links() !!}
        
@endsection