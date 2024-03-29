@extends('layouts.app')

@section('content')
<form method="POST" action="{{ url('/countries/create') }}">
@csrf
<div class="container">
  <div class="card">
    <div class="card-header">
      <h3><i class="fa fa-plus"></i> Add new Country</h3>
    </div>
    <div class="card-body">
      <div class="form-group">
          <div class="row">
            <div class="col-md-8">
              <label for="name">Country</label>
              <input type="text" name="name" class="form-control" placeholder="Type the name of the country..." required>
            </div>
            <div class="col-md-4">
              <label for="abbr">Abbreviation</label>
              <input type="text" name="abbr" class="form-control" placeholder="Type the abbreaviation for the country..." required>
            </div>
          </div>
          <br>
          <input type="submit" class="btn btn-primary" value="Add Country">
      </div>
    </div>
  </div>
</div>
</form>
<br>
<div class="container">
  <div class="card">
    <div class="card-header">
      <h3><i class="fa fa-globe"></i> Already added Countries</h3>
    </div>
    <div class="card-body">
      @foreach($countries as $country)
        <div class="col-md-3" style="float: left">
          <ul>
            <li class="text-center">{{ $country->name.' ('.$country->abbr.')' }}</li>
          </ul>
        </div>
      @endforeach
    </div>
  </div>
</div>
@endsection