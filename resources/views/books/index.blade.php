@extends('layout.master')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Data book</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('books.create') }}"> Create</a>
            </div>
        </div>
    </div>
    <br>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <form class="form" method="get" action="{{ route('searchbooks') }}">
    <div class="form-group w-75 mb-2 float-right">
        <input type="text" name="searchbooks" class="form-control w-50 d-inline" placeholder="Search..." value="{{ request('searchbooks') }}">
        <button type="submit" class="btn btn-primary mb-1">Search</button>
        <a class="btn btn-danger mb-1" href="{{ route('books.index') }}"> Refresh</a>

    </div>
    </form>
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Judul Buku</th>
            <th>Penulis</th>
            <th>Penerbit</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($books as $book)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $book->judul }}</td>
            <td>{{ $book->penulis }}</td>
            <td>{{ $book->penerbit }}</td>
            <td>
                <form action="{{ route('books.destroy',$book->id) }}" method="POST">
           
                    <a class="btn btn-primary" href="{{ route('books.edit',$book->id) }}">Edit</a>
     
                    @csrf
                    @method('DELETE')
        
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    
    {!! $books->links() !!}
        
@endsection