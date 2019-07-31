@extends('layouts.sidebar')

@section('content')
<form method="POST" action="{{ url('/discussions/create') }}">
  @csrf
  <div class="container">
      <div class="card">
          <div class="card-header">
              <h3>Create a Thread</h3>
          </div>
          <div class="card-body">
              <div class="form-group">
                <div class="row">
                  <div class="col-md-8">
                    <input type="text" name="title" class="form-control" placeholder="Add a title" required>
                  </div>
                  <div class="col-md-4">
                    <select class="form-control" name="channel" required>
                      <option value="">Select Channel</option>
                      @foreach($channels as $channel)
                        <option value="{{ $channel->id }}">{{ $channel->channel }}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                <br>
                <textarea class="form-control" rows="6" name="query" placeholder="Type in your query..." required></textarea>
                <br>
                <input type="submit" class="btn btn-success" value="Create Thread">
              </div>
          </div>
      </div>
  </div>
</form>
@endsection