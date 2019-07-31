@extends('layouts.sidebar')

@section('content')
<div class="container">
  <div class="card">
    <div class="card-body">
      <div class="row">
        <div class="col-md-10">
          <h6><a href="{{ url('/profile/'.$username) }}" class="text-danger"><strong>{{ $username }}</strong></a></h6><small>{{ $thread->created_at }}</small>
        </div>
        <div class="col-md-2" style="padding-top: 13px; text-align: right; ">
          <a href="{{ url('/discussions/channel/'.$thread->channel_id.'/'.$channel) }}" class="badge badge-primary" style="color: #fff; font-size: 14px; padding: 7px 18px" title="Channel Threads">{{ $channel }}</a>
        </div>
      </div>
      <div class="row" style="background-color: #00cccc; border-radius: 10px; margin: 0px;">
        <div class="col-md-9" style="background-color: #ffff80 ; border-radius: 15px 60px 60px 15px;">
          <h2 style="padding-top: 10px;">{{ $thread->title }}</h2>
        </div>
        <div class="col-md-3" style="text-align:right; padding-top: 13px">
          <i class="fa fa-eye fa-lg" title="Total number of views"></i> <span class="badge badge-primary">{{ $thread->views }}</span>&nbsp;
          <i class="fa fa-comments fa-lg" title="Total number of comments"></i> <span class="badge badge-primary">{{ count($comments) }}</span>&nbsp;
          @if(Auth::user()->id == $thread->user_id)
            <a href="{{ url('/discussions/edit/'.$thread->thread_slug) }}" class="btn btn-sm btn-dark" style="margin-right: 2px; display:inline-block;" title="Edit Thread"><i class="fa fa-edit fa-lg"></i></a>&nbsp;
            @if(count($comments) == 0)
            <form style="display:inline-block;" method="DELETE" action="{{ url('/discussions/delete/'.$thread->thread_slug) }}">
              <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-trash fa-lg" title="Delete Thread"></i></button>
            </form>
            @endif
          @endif
        </div>
      </div>
      <div class="row">
        <div class="col-md-12" style="padding-top: 10px;">
          <h5 style="text-align: justify">{{ $thread->query }}</h5>
        </div>
      </div>
      <hr>
      @if(count($comments))
        <div class="container">
        @foreach($comments as $comment)
          <div style="{{ $comment->helpful == 1 ? "background-color: #e1eaea; border: 1px solid #666666; border-radius: 10px;" : "" }}">
            <div class="row" style="padding: 10px 10px; ">
                <div class="col-md-8">
                  <small><a href="{{ url('/profile/'.$comment->username) }}" class="text-danger"><strong>{{ $comment->username }}</strong></a> | {{ $comment->updated_at }} | </small>
                  @if(Auth::user()->id == $comment->user_id)
                    <a href="{{ url('/comments/edit/'.$comment->id.'/'.$thread->thread_slug) }}" class="btn btn-dark btn-sm" title="Edit comment"><i class="fa fa-edit"></i></a>
                    <a href="{{ url('/comments/delete/'.$comment->id.'/'.$thread->thread_slug) }}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                  @endif
                </div>
                @if($comment->helpful == 1)
                <div class="col-md-2" style="margin-left: 120px">
                      @if(Auth::user()->id == $thread->user_id)
                        <a href="{{ url('/comments/notHelpful/'.$comment->id.'/'.$thread->thread_slug) }}" class="btn btn-success" style="margin-left: 55px; border-radius: 20px">Best Answer</a>
                      @else
                        <button class="btn btn-success" style="margin-left: 55px; border-radius: 20px" disabled>Best Answer</button>
                      @endif
                </div>
                @elseif(Auth::user()->id == $thread->user_id && $thread->status != "SOLVED")
                <div class="col-md-2" style="margin-left: 110px">
                  <a href="{{ url('/comments/helpful/'.$comment->id.'/'.$thread->thread_slug) }}" class="btn btn-secondary" style="border-radius: 1.24rem;">Mark as Best Answer</a>
                </div>
                @endif
            </div>
            <div class="row" style="margin-left: 25px; margin-right: 25px; background-color: #d9d9d9; border-radius: 10px;">
              <span style="text-align: justify; padding: 10px 10px;">
                {{ $comment->comment }}
              </span>
            </div>
            <div class="row" id="likes-dislikes" style="padding: 10px 25px;">
              <a href="{{ url('/comments/like/'.$comment->id.'/'.$thread->thread_slug) }}"><i class="fa fa-lg fa-thumbs-up" title="Like comment"></i> @if(count($comment->likes) > 0)<span class="badge badge-danger" title="Total number of likes">{{ count($comment->likes) }}</span>@endif</a>
            </div>
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