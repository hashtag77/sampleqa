@extends('layouts.app')

@section('content')
<div class="container-fluid row">
  <div class="container-fluid col-md-4">
    <form method="POST" action="{{ url('/todos/store') }}">
      @csrf
      <div class="card">
        <div class="card-header">
          <h3><i class="fa fa-plus"></i> Create a TODO</h3>
        </div>
        <div class="card-body">
          <div class="form-group">
              <label for="title">Title</label>
              <input type="text" name="title" class="form-control" placeholder="What is it?" required>
              <br>
              <label for="section">Section</label>
              <select name="section" class="form-control">
                <option value="">Select Section</option>
                @foreach($sections as $section)
                  <option value="{{ $section->id }}">{{ $section->name }}</option>
                @endforeach
              </select>
              <br>
              <label for="status">Select Status</label>
              <select name="status" class="form-control">
                <option value="PENDING">PENDING</option>
                <option value="DONE">DONE</option>
              </select>
              <br>
              <input type="submit" class="btn btn-primary form-control" value="Create ToDo">
          </div>
        </div>
      </div>
    </form>
  </div>
  <br>
  <div class="container-fluid col-md-8">
    <div class="card">
      <div class="card-header">
        <h3><i class="fa fa-check-square-o"></i> TODOs</h3>
      </div>
      <div class="card-body">
        @if(count($todos) > 0)
        <table class="table table-striped">
          <thead>
            <th>#</th>
            <th>Title</th>
            <th>Section</th>
            <th>Status</th>
            <th>Created</th>
            <th>Completed</th>
            <th>Action</th>
          </thead>
          <tbody>
            @php $counter = 0; @endphp
            @foreach($todos as $todo)
              @php ++$counter; @endphp
              <tr>
                <td>{{ $counter }}</td>
                <td>{{ $todo->title }}</td>
                <td>{{ $todo->section_name }}</td>
                <td><span class="badge {{ ($todo->status == "DONE") ? 'badge-success' : 'badge-warning' }}" style="padding: 5px 10px;">{{ $todo->status }}</span></td>
                <td>{{ \Carbon\Carbon::parse($todo->created_at)->diffforhumans() }}</td>
                <td>{{ \Carbon\Carbon::parse($todo->updated_at)->diffforhumans() }}</td>
                <td>
                  @if($todo->status == 'PENDING')
                    <a href="{{ url('/todos/update/'.$todo->id) }}" class="btn btn-dark" title="Mark as DONE"><i class="fa fa-check text-light"></i></a>
                  @else
                    <a href="{{ url('/todos/update/'.$todo->id) }}" class="btn btn-danger" title="Mark as UN-DONE"><i class="fa fa-times text-light"></i></a>
                  @endif
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
        @else
          <h5><i>No Todos available!</i></h5>
        @endif
      </div>
    </div>
  </div>
</div>
@endsection