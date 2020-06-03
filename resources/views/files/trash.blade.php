@extends('welcome')

@section('title', 'File Trash')

@section('index')

@include('includes._dashfile')

@include('includes._msg')

 <h2>Section title</h2>
      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>#</th>
              <th>Action</th>
              <th>File Name</th>
              <th>Company</th>
              <th>Description</th>
            </tr>
          </thead>
          <tbody>
            @forelse ($trashed as $trash)
            <tr>
              <td>{{ $trash->id }}</td>
              <td><a href="/file/{{$trash->id}}/restore" title=""><button type="submit" class="btn btn-info btn-sm pull-left mx-2">Restore</button></a> 

                <form style="float: left;" action="{{ route('file.destroy', $trash->id) }}" method="post">
                  {{ method_field('delete') }}
                  <button type="submit" class="btn btn-danger btn-sm pull-left">Delete</button>
                  {{ csrf_field() }}
                </form>

              </td>
              <td>{{ $trash->name }}</td>
              <td>{{ $trash->company->company }}</td>
              <td>{{ $trash->description }}</td>
            
            @empty
              <tr>
                <td>No item in trash!</td>
              </tr>
            @endforelse
          </tbody>
        </table>
        <p style="text-align: center;">{{$trashed->links()}}</p>
      </div>
@endsection