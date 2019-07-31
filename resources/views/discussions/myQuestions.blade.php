@extends('layouts.sidebar')

@section('content')
<div class="container">
  <div class="card">
    @if(count($threads))
      @foreach($threads as $thread)
      <div class="card-body">
        <div class="row">
          <div class="col-md-8">
            <h2><a href="{{ url('/discussions/view/'.$thread->thread_slug) }}">{{ $thread->title }}</a></h2>
          </div>
          <div class="col-md-4" style="text-align: right">
            <a href="#" class="badge badge-dark" style="padding: 10px 15px">{{ $thread->channel }}</a>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-4">
            <small><a href="{{ url('/profile/'.$thread->username) }}" class="text-danger"><strong>{{ $thread->username }}</strong></a> | {{ $thread->created_at }} </small>
          </div>
        </div>
      </div>
      <hr>
      @endforeach
      <span style="padding-left:20px">{{ $threads->links() }}</span>
    @else
    <p style="padding-left:10px; padding-top:10px;">No Threads found!</p>
    @endif
  </div>
</div>
@endsection
