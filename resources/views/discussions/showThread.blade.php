@extends('layouts.sidebar')

@section('content')
<div class="container">
  <div class="card">
    <div class="card-body">
      <div class="row">
        <div class="col-md-10">
          <h6><a href="{{ url('/profile/'.$username) }}" class="text-danger"><strong>{{ $username }}</strong></a></h6><small>{{ $thread->created_at }}</small>
        </div>
        <div class="col-md-2" style="padding-top: 13px; text-align: center; ">
          <a href="#" class="badge badge-primary" style="color: #fff; font-size: 14px; padding: 7px 18px">{{ $channel }}</a>
        </div>
      </div>
      <div class="row">
        <div class="col-md-8 bg-light text-center">
          <h2 style="padding: 8px;">{{ $thread->title }}</h2>
        </div>
        <div class="col-md-2 text-center" style="padding-top: 7px">
          Views <span class="badge badge-primary">{{ $thread->views }}</span><br>
          Comments <span class="badge badge-primary">{{ count($comments) }}</span>
        </div>
        <div class="col-md-2" style="text-align:center; padding-top: 16px">
          <a href="{{ url('/discussions/edit/'.$thread->thread_slug) }}" class="btn btn-sm btn-dark" style="margin-right: 2px; display:inline-block;">Edit</a>
          @if(count($comments) == 0)
          <form style="display:inline-block;" method="DELETE" action="{{ url('/discussions/delete/'.$thread->thread_slug) }}">
            <input type="submit" class="btn btn-sm btn-danger" value="Delete">
          @endif
        </div>
      </div>
      <div class="row">
        <div class="col-md-12" style="padding-top: 5px;">
          <h5 style="text-align: justify">{{ $thread->query }}</h5>
        </div>
      </div>
      <hr>
      @if(count($comments))
        <div class="container">
        @foreach($comments as $comment)
          <div class="row" style="padding-top: 10px;">
              <div class="col-md-10">
                <small><a href="{{ url('/profile/'.$comment->username) }}" class="text-danger"><strong>{{ $comment->username }}</strong></a> | {{ $comment->created_at }} </small>
              </div>
              @if($comment->helpful == 1)
              <div class="col-md-2">
                <span class="badge" style="background-color: #b3ff66; color: #000; font-size: 14px; padding: 12px 41px">Best Answer</a>
              </div>
              @elseif(Auth::user()->id == $thread->user_id && $thread->status != "SOLVED")
              <div class="col-md-2">
                <a href="{{ url('/comments/helpful/'.$comment->id.'/'.$thread->thread_slug) }}" class="btn btn-secondary">Mark as Best Answer</a>
              </div>
              @endif
          </div>
          <div class="row" style="padding: 10px 30px;">
            <span style="text-align: justify">
              {{ $comment->comment }}
            </span>
          </div>
          <div class="row" id="likes-dislikes">
            <small><a href="{{ url('/comments/like/'.$comment->id.'/'.$thread->thread_slug) }}">Like</a> @if($comment->likes > 0)<span class="badge badge-success">{{ $comment->likes }}</span>@endif</small>
          </div>
        @endforeach
        </div>
        <span style="padding-left:20px">{{ $comments->links() }}</span>
      @endif
      <form method="POST" action="{{ url('/comments/post') }}">
        @csrf
        <div class="form-group">
          <div class="row">
            <input type="hidden" name="discussion_id" value="{{ $thread->id }}">
            <input type="hidden" name="thread_slug" value="{{ $thread->thread_slug }}">
            <textarea class="form-control" rows="4" name="comment" placeholder="Write a reply..." required></textarea>
          </div>
          <br>
          <div class="row">
            <input type="reset" class="btn btn-light" value="Cancel" style="margin-right: 5px">
            <input type="submit" class="btn btn-success" value="Post" style="margin-left: 5px">
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
@endsection