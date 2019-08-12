@extends('layouts.app')

@section('content')
<div class="container-fluid row">
  <div class="container-fluid col-md-4">
    <form method="POST" action="{{ url('/sections/store') }}">
      @csrf
      <div class="card">
        <div class="card-header">
          <h3><i class="fa fa-plus"></i> Create a Section</h3>
        </div>
        <div class="card-body">
          <div class="form-group">
              <label for="name">Name</label>
              <input type="text" name="name" class="form-control" placeholder="Name your section..." required>
              <br>
              <input type="submit" class="btn btn-primary form-control" value="Create Section">
          </div>
        </div>
      </div>
    </form>
  </div>
  <br>
  <div class="container-fluid col-md-8">
    <div class="card">
      <div class="card-header">
        <h3><i class="fa fa-columns"></i> Sections</h3>
      </div>
      <div class="card-body">
        @if(count($sections) > 0)
        <table class="table table-striped">
          <thead>
            <th>#</th>
            <th>Name</th>
            <th>Created</th>
          </thead>
          <tbody>
            @php $counter = 0; @endphp
            @foreach($sections as $section)
              @php ++$counter; @endphp
              <tr>
                <td>{{ $counter }}</td>
                <td>{{ $section->name }}</td>
                <td>{{ \Carbon\Carbon::parse($section->created_at)->diffforhumans() }}</td>
              </tr>
            @endforeach
          </tbody>
        </table>
        @else
          <h5><i>No Sections available!</i></h5>
        @endif
      </div>
    </div>
  </div>
</div>
@endsection