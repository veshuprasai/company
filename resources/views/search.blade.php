@extends('welcome')

@section('title', 'Search Result')

@section('index')

@include('includes._dashcompany')

@include('includes._msg')

 <h2>Section title</h2>
    <p> The Search results for your query <b> {{ $query ?? '' }} </b> are :</p>
      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>Name </th>
              <th>Type</th>
              <th>Address</th>
              <th>Phone</th>
              <th>Owner</th>
              <th>Shareholder</th>
            </tr>
          </thead>
          @if(isset($details))
          <tbody>
            @foreach($details as $user)
            <tr>
                <td><a href="/company/{{ $user->id }}">{{$user->company}}</a></td>
                <td>{{$user->type}}</td>
                <td>{{$user->address}}</td>
                <td>{{$user->phone}}</td>
                <td>{{$user->owner}}</td>
                <td>{{$user->shareholders}}</td>
            </tr>
            @endforeach
          </tbody>
          @endif
        </table>
        
      </div>
@endsection

