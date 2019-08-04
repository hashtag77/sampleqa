@extends('layouts.sidebar')

@section('content')
<div class="container">
  <div class="card">
    <div class="card-header">
      <h2><u>{{ $pageTitle }}</u></h2>
    </div>
    @if(count($threads))
      @foreach($threads as $thread)
        @if(count($thread->comments) == 0)
        <div class="card-body">
          <div class="row">
            <div class="col-md-8">
              <h3><a href="{{ url('/discussions/view/'.$thread->thread_slug) }}">{{ $thread->title }}</a></h3>
            </div>
            <div class="col-md-2" style="text-align: right">
              <i class="fa fa-eye fa-lg" title="Total number of views"></i> <span class="badge badge-primary">{{ $thread->views }}</span>&nbsp;
              <i class="fa fa-comments fa-lg" title="Total number of comments"></i> <span class="badge badge-primary">{{ count($thread->comments) }}</span>
            </div>
            <div class="col-md-2" style="text-align: right">
              <a href="{{ url('/discussions/channel/'.$thread->channel_id.'/'.$thread->channel) }}" class="badge badge-dark" style="padding: 10px 15px" title="Channel Threads">{{ $thread->channel }}</a>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-4">
              <small><a href="{{ url('/profile/'.$thread->username) }}" class="text-danger"><strong>{{ $thread->username }}</strong></a> | {{ \Carbon\Carbon::parse($thread->updated_at)->diffforhumans() }} </small>
            </div>
          </div>
        </div>
        <hr>
        @endif
      @endforeach
    @else
    <p style="padding-left:10px; padding-top:10px;">No Threads found!</p>
    @endif
  </div>
</div>
@endsection
