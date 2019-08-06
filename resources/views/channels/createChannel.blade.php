@extends('layouts.app')

@section('content')
<form method="POST" action="{{ url('/channels/create') }}">
@csrf
<div class="container">
      <div class="card">
          <div class="card-header">
              <h3>Create a Channel</h3>
          </div>
          <div class="card-body">
              <div class="form-group">
                <input type="text" name="channel" class="form-control" placeholder="Channel (for ex. Laravel, Angular)" required>
               <br>
                  <input type="submit" class="btn btn-primary" value="Add Channel">
              </div>
          </div>
      </div>
  </div>
</form>
<br>
<div class="container">
    <div class="card">
      <div class="card-header">
        <h3>Already added Channels</h3>
      </div>
      <div class="card-body">
        @foreach($channels as $channel)
          <div class="col-md-3" style="float: left">
            <ul>
                <li class="text-center">{{ $channel->channel }}</li>
            </ul>
          </div>
        @endforeach
      </div>
    </div>
  </div>
@endsection