@extends('layouts.sidebar')

@section('content')
<div class="container">
  <div class="card">
    <div class="card-header">
      <h2>{!! $pageTitle !!}</h2>
    </div>
    @if(count($threads))
      @foreach($threads as $thread)
      <div class="card-body">
        <div class="col-md-12">
          <div class="row">
            <div class="col-md-1">
            <img src="{{ url('/storage/avatars/'.$thread->avatar) }}" style="{{ ($thread->status == 'SOLVED' ? 'opacity: 0.5;' : '') }}width: 50px; height: 50px; border-radius: 25px">
            </div>
            <div class="col-md-11">
              <div class="row">
                <div class="col-md-8">
                  <h3><a href="{{ url('/discussions/view/'.$thread->thread_slug) }}">{{ $thread->title }}</a></h3>
                  <small><span class="text-danger"><strong>{{ $thread->username }}</strong></span> | {{ \Carbon\Carbon::parse($thread->updated_at)->diffforhumans() }}</small>
                </div>
                <div class="col-md-2" style="text-align: right">
                  <i class="fa fa-eye fa-lg" title="Total number of views"></i> <span class="badge badge-primary">{{ $thread->views }}</span>&nbsp;
                  <i class="fa fa-comments fa-lg" title="Total number of comments"></i> <span class="badge badge-primary">{{ count($thread->comments) }}</span>
                </div>
                <div class="col-md-2" style="text-align: right">
                  <a href="{{ url('/discussions/channel/'.$thread->channel_id.'/'.$thread->channel) }}" class="badge badge-dark" style="padding: 10px 15px" title="Channel Threads">{{ $thread->channel }}</a>
                </div>
              </div>
            </div>
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
