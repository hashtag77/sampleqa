@extends('layouts.sidebar')

@section('content')
<div class="container">
  <div class="card">
    <div class="card-header" style="margin-bottom: 15px">
      <h2><i class="fa fa-bell"></i> <u>{{ $pageTitle }}</u></h2>
    </div>
    @if(count($notifications) > 0)
      @foreach($notifications as $notification)
        <div class="col-md-12">
            <div class="row">
              <div class="col-md-10">
                <a href="{{ url('/notifications/'.$notification->id) }}" style="font-size: 16px; padding: 0.25rem 0.5rem;">
                  <img src="{{ url('/storage/avatars/'.$notification->avatar) }}" style="width: 35px; height: 35px; border-radius: 17px">
                  <strong> {{ $notification->username }}</strong> {{ $notification->type }} <strong>{{ $notification->description }}</strong>
                </a>
                <br>
                <span class="badge badge-info" style="margin-left: 45px">{{ ($notification->xp != '') ? '('.$notification->xp.')' : '' }}</span>
              </div>
              <div class="col-md-2" style="text-align: right">
                <small>{{ \Carbon\Carbon::parse($notification->created_at)->diffforhumans() }}</small>
              </div>
            </div>
        </div>
      <hr>
      @endforeach
    @else
    <p style="padding-left:10px; padding-top:10px;"><i>No notifications found!</i></p>
    @endif
  </div>
</div>
@endsection