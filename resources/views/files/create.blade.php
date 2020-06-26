@extends('welcome')

@section('title', 'File Create')

@section('index')

@include('includes._dashfile')

  <form action="{{ route('file.store') }}" method="post" enctype="multipart/form-data">
    <div class="row">
      
      <div class="form-group col-sm">
          <label for="exampleFormControlFile1">Upload File</label>
          <input type="file" name="image" id="image">
      </div>

      <div class="form-group col-sm">
          <label>Description:</label>
          <textarea type="text" name="description" class="form-control" rows="3"></textarea>
      </div>
      <div class="form-group col-sm">
        <label for="exampleFormControlSelect1">Company</label>
        <select name="company_id" class="form-control">
          @foreach($companies as $company)
          <option value="{{ $company->id }}" selected>{{ $company->company }}</option>
          @endforeach
        </select>
      </div>

    </div>
    <div class="col-auto">
      <button type="submit" class="btn btn-primary mb-2 col-sm">Submit</button>
    </div>
{{ csrf_field() }}
</form>

@endsection