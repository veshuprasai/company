@extends('welcome')

@section('title', 'Company Create')

@section('index')

@include('includes._dashcompany')

  <form action="{{ route('company.store') }}" method="post">
    <div class="row">
      <div class="form-group col-sm">
        <label for="company">Company</label>
        <input type="text" class="form-control" name="company" id="company" placeholder="Name of the Company">
      </div>
      <div class="form-group col-sm">
        <label for="company">Type</label>
        <input type="text" class="form-control" name="type" id="type" placeholder="Type of the Company">
      </div>
    </div>
    <div class="row">
      <div class="form-group col-sm">
        <label for="company">Phone Number</label>
        <input type="text" class="form-control" name="phone" id="phone" placeholder="Contact detail">
      </div>
      <div class="form-group col-sm">
        <label for="company">Address</label>
        <input type="text" class="form-control" name="address" id="address" placeholder="Address of the Company">
      </div>
    </div>
    <div class="form-group">
      <label for="company">Owner</label>
      <input type="text" class="form-control" name="owner" id="owner" placeholder="Name of the Owner">
    </div>
    <div class="form-group">
      <label for="company">Shareholders</label>
      <textarea class="form-control" name="shareholders" id="shareholders" rows="3"></textarea>
    </div>
    <div class="form-group">
      <label for="company">Description</label>
      <textarea class="form-control" name="description" id="description" rows="3"></textarea>
    </div>
    <div class="row">
      <div class="form-group col-sm">
        <label for="company">Nepali Date</label>
        <input type="text" class="form-control" name="nepalidate" id="nepalidate" placeholder="Nepali date for refrence">
      </div>
      <div class="form-group col-sm">
        <label for="exampleFormControlSelect1">Publish</label>
        <select name="publish" class="form-control">
          <option value="1" selected>Publish</option>
          <option value="0">Unpublish</option>
        </select>
      </div>
    </div>
    <div class="col-auto">
    <button type="submit" class="btn btn-primary mb-2 col-sm">Submit</button>
  </div>
{{ csrf_field() }}
</form>

@endsection