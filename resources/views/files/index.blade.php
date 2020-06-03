@extends('welcome')

@section('title', 'File Index')

@section('index')

@include('includes._dashfile')

@include('includes._msg')

 <h2>Section title</h2>
      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>#</th>
              <th>Name</th>
              <th>Description</th>
              <th>Company</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ( $files as $file )
            <tr>
              <td>{{ $file-> id }}</td>
              <td><a href="/file/{{ $file->id }}">{{ $file->name }}</a></td>
              <td>{{ $file->description}}</td>
              <td>{{ $file->company->company }}</td>
              <td>
                <form style="float: left" action="{{ route('file.delete', $file->id) }}" method="post">
                  {{ method_field('delete') }}
                  <button type="submit" class="btn btn-danger btn-sm pull-left">Delete</button>
                  {{ csrf_field() }}
                </form>

              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
        <p style="text-align: center;">{{$files->links()}}</p>
      </div>
@endsection