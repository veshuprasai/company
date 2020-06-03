@extends('welcome')

@section('title', 'Company Trash')

@section('index')

@include('includes._dashcompany')

@include('includes._msg')

 <h2>Section title</h2>
      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>#</th>
              <th>Action </th>
              <th>Name</th>
              <th>Phone</th>
              <th>owner</th>
              <th>Address</th>
            </tr>
          </thead>
          <tbody>
            @forelse ($trashed as $trash)
            <tr>
              <td>{{ $trash->id }}</td>
              <td><a href="/company/{{$trash->id}}/restore" title=""><button type="submit" class="btn btn-info btn-sm pull-left mx-2">Restore</button></a> 

                <form style="float: left;" action="{{ route('company.destroy', $trash->id) }}" method="post">
                  {{ method_field('delete') }}
                  <button type="submit" class="btn btn-danger btn-sm pull-left">Delete</button>
                  {{ csrf_field() }}
                </form>

              </td>
              <td>{{ $trash->company }}</td>
              <td>{{ $trash->phone }}</td>
              <td>{{ $trash->owner }}</td>
              <td>{{ $trash->address }}</td>
            </tr>
            
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