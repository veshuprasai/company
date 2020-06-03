@extends('welcome')

@section('title', 'File Edit')

@section('index')

@include('includes._dashfile')

  <form action="{{ route('file.update', $file->id) }}" method="post" enctype="multipart/form-data">
    {{ method_field('patch') }}
    <div class="row">
      <div class="form-group col-sm">
          <label for="exampleFormControlFile1">Upload other file and replace</label>
          <input type="file" name="image" id="image">
      </div>      
      
      <div class="form-group col-sm">
          <label>Description:</label>
          <textarea type="text" name="description" class="form-control" rows="3">{{ $file->description }}</textarea>
      </div>
      <div class="form-group col-sm">
        <label for="exampleFormControlSelect1">Company</label>
        <select name="company_id" class="form-control">
          @foreach($companies as $company)
          <option {{ ($company->id == $file->company_id) ? "selected":"" }} value="{{ $company->id }}"> {{ $company->company }}</option>
          @endforeach
        </select>
      </div>

    </div>
    <div class="col-auto">
      <button type="submit" class="btn btn-primary mb-2 col-sm">Update</button>
    </div>
{{ csrf_field() }}
</form>

@endsection