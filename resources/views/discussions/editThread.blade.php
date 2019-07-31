@extends('layouts.sidebar')

@section('content')
<form method="POST" action="{{ url('/discussions/update') }}">
  @csrf
  <div class="container">
        <div class="card">
            <div class="card-header">
                <h3>Edit Thread</h3>
            </div>
            <div class="card-body">
                <div class="form-group">
                  <div class="row">
                    <div class="col-md-8">
                      <input type="text" name="title" class="form-control" value="{{ $thread->title }}" required>
                    </div>
                    <div class="col-md-4">
                      <select class="form-control" name="channel" required>
                        <option value="{{ $thread->channel_id }}" selected>{{ $thread->channel }}</option>
                        @foreach($channels as $channel)
                          <option value="{{ $channel->id }}">{{ $channel->channel }}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                  <br>
                  <textarea class="form-control" rows="6" name="query" required>{{ $thread->query }}</textarea>
                  <br>
                  <input type="hidden" name="discussion_id" value="{{ $thread->id }}">
                  <input type="hidden" name="thread_slug" value="{{ $thread->thread_slug }}">
                  <input type="submit" class="btn btn-success" value="Update Thread">
                </div>
            </div>
        </div>
    </div>
  </form>
@endsection