@extends('welcome')

@section('title', 'File Show')

@section('index')

@include('includes._dashfile')

@include('includes._msg')

  <div class="row">
    <div class="form-group col-sm">
      <img src="/uploads/image/{{$file->name}}" alt="This is not a image file." class="img-thumbnail">
    </div>
    <div class="form-group col-sm pl-2">
          <h2>Company: <a href="/company/{{$file->company->id}}" title="">{{$file->company->company}}</a></h2>
          <p>Description: {{$file->description}}</p>
          <p>Download: <a href="/uploads/image/{{$file->name}}" target="_blank">Click here to download</a></p>
          <p id="test"></p>
    </div>
  </div>
  <a href="/file/{{$file->id}}/edit" title=""><button type="submit" class="btn btn-primary col-sm">Edit</button></a> 

@endsection