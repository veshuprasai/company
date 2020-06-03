@extends('welcome')

@section('title', 'Company Show')

@section('index')

@include('includes._dashcompany')

@include('includes._msg')

  <div class="row">
    <div class="form-group col-sm">
      <p>Click to download</p>
      @foreach ($file as $fil)
      <a href="/uploads/image/{{ $fil->name }}" target="_blank">
        <img src="/uploads/image/{{ $fil->name }}" alt="This is not a image file." class="img-thumbnail">
      </a>
      @endforeach
    </div>
    
    <div class="form-group col-sm pl-2">
          <p><strong>Company:</strong> {{ $company->company }}</p>
          <p><strong>Type:</strong> {{ $company->type }}</p>
          <p><strong>Phone:</strong> {{ $company->phone }}</p>
          <p><strong>Address:</strong> {{ $company->address }}</p>
          <p><strong>Owner:</strong> {{ $company->owner }}</p>
          <p><strong>Shareholder:</strong> {{ $company->shareholders }}</p>
          <p><strong>Description:</strong> {{ $company->description }}</p>
          <p><strong>Nepali Date:</strong> {{ $company->nepalidate }}</p>
          <p><strong>Active:</strong> {{ ($company->is_active == '1')? "Active":"No active" }}</p>
    </div>
  </div>
  <a href="/company/{{$company->id}}/edit" title=""><button type="submit" class="btn btn-primary col-sm">Edit</button></a> 

@endsection