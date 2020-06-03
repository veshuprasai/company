@extends('welcome')

@section('title', 'Company Index')

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
              <th>Active</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($companies as $company)
            <tr>
              <td>{{ $company->id }}</td>
              <td><a href="/company/{{$company->id}}/edit" title=""><button type="submit" class="btn btn-info btn-sm pull-left mx-2">Edit</button></a> 

                <form style="float: left" action="{{ route('company.delete', $company->id) }}" method="post">
                  {{ method_field('delete') }}
                  <button type="submit" class="btn btn-danger btn-sm pull-left">Delete</button>
                  {{ csrf_field() }}
                </form>

              </td>
              <td><a href="/company/{{ $company->id }}">{{ $company->company }}</a></td>
              <td>{{ $company->phone }}</td>
              <td>{{ $company->owner }}</td>
              <td>{{ $company->address }}</td>
              <td>{{ ($company->is_active == '1')? "Active":"Inactive" }}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
        <p style="text-align: center;">{{$companies->links()}}</p>
      </div>
@endsection