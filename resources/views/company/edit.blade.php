@extends('welcome')

@section('title', 'Company Edit')

@section('index')

@include('includes._dashcompany')

@include('includes._msg')

  <form action="{{ route('company.update', $company->id) }}" method="post">
    {{ method_field('patch')}}
    <div class="row">
      <div class="form-group col-sm">
        <label for="company">Company</label>
        <input type="text" class="form-control" name="company" id="company" value="{{ $company->company }}">
      </div>
      <div class="form-group col-sm">
        <label for="company">Type</label>
        <input type="text" class="form-control" name="type" id="type" value="{{ $company->type }}">
      </div>
    </div>
    <div class="row">
      <div class="form-group col-sm">
        <label for="company">Phone Number</label>
        <input type="text" class="form-control" name="phone" id="phone" value="{{ $company->phone }}">
      </div>
      <div class="form-group col-sm">
        <label for="company">Address</label>
        <input type="text" class="form-control" name="address" id="address" value="{{ $company->address }}">
      </div>
    </div>
    <div class="form-group">
      <label for="company">Owner</label>
      <input type="text" class="form-control" name="owner" id="owner" value="{{ $company->owner }}">
    </div>
    <div class="form-group">
      <label for="company">Shareholders</label>
      <textarea class="form-control" name="shareholders" id="shareholders" rows="3">{{ $company->shareholders }}</textarea>
    </div>
    <div class="form-group">
      <label for="company">Description</label>
      <textarea class="form-control" name="description" id="description" rows="3">{{ $company->description }}</textarea>
    </div>
    <div class="row">
      <div class="form-group col-sm">
        <label for="company">Nepali Date</label>
        <input type="text" class="form-control" name="nepalidate" id="nepalidate" value="{{ $company->nepalidate }}">
      </div>
      <div class="form-group col-sm">
        <label for="exampleFormControlSelect1">Publish</label>
        <select name="publish" class="form-control">
          <option value="1" {{ ($company->is_active == '1')? "selected":"" }}>Publish</option>
          <option value="0" {{ ($company->is_active == '0')? "selected":"" }}>Unpublish</option>
        </select>
      </div>
    </div>
    <div class="col-auto">
    <button type="submit" class="btn btn-primary mb-2 col-sm">Update</button>
  </div>
{{ csrf_field() }}
</form>

@endsection