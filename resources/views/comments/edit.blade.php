@extends('layouts.sidebar')

@section('content')
<form method="POST" action="{{ url('/comments/update') }}">
@csrf
  <div class="container">
    <div class="card">
      <div class="card-header">
        <h3>Create a Channel</h3>
      </div>
      <div class="card-body">
        <div class="form-group">
          <input type="text" name="comment" class="form-control" placeholder="Please Type 
          something..." value="{{ $comment->comment }}" required>
          <input type="hidden" name="comment_id" value="{{ $comment->id }}">
          <input type="hidden" name="thread_slug" value="{{ $thread_slug }}">
          <br>
          <a href="{{ url('/discussions/view/'.$thread_slug) }}" class="btn btn-light">Cancel</a>
          <input type="submit" class="btn btn-primary" value="Update">
        </div>
      </div>
    </div>
  </div>
</form>
@endsection