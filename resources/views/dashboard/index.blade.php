@extends('layouts.app')

@section('content')
<div class="container-fluid" style="padding-left: 0px; padding-right: 0px; margin-top: -22px">
    <div class="jumbotron" style="padding: 2rem 4rem;">
        <div class="row">
            <div class="col-md-3">
                <img src="{{ url('/storage/avatars/'.$user->avatar) }}" style="width: 200px; height: 200px; border-radius: 110px">
            </div>
            <div class="col-md-5" style="padding-top: 25px">
                <h2 style="vertical-align: middle; display:inline-block; margin-right: 10px"><strong>{{ $user->name }}</strong></h2>
                @if(isset($userProfile))
                <span style="display:inline-block;">
                    @if($userProfile->website != '')
                        <a href="{{ 'https://'.$userProfile->website }}" style="margin-left:10px"><i class="fa fa-globe fa-lg"></i></a>
                    @endif
                    @if($userProfile->github != '')
                        <a href="{{ 'https://github.com/'.$userProfile->github }}" style="margin-left:10px"><i class="fa fa-github fa-lg"></i></a>
                    @endif
                    @if($userProfile->twitter != '')
                        <a href="{{ 'https://twitter.com/'.$userProfile->twitter }}" style="margin-left:10px"><i class="fa fa-twitter fa-lg"></i></a>
                    @endif
                </span>
                @endif
                <h4>{{ $user->username }}</h4>
                @if(isset($userProfile) && isset($userProfile->company) && $userProfile->company != '' && isset($userProfile->job_title) && $userProfile->job_title != '')
                    <h5>{{ $userProfile->job_title.' at '.$userProfile->company }}</h5>
                @else
                    {!! (isset($userProfile->job_title) && $userProfile->job_title != '') ? '<h5>'.$userProfile->job_title.'</h5>' : ((isset($userProfile->company) && $userProfile->company != '') ? '<h5>Works at <strong>'.$userProfile->company.'</strong></h5>' : '') !!}
                @endif
                @if(isset($userProfile) && isset($userProfile->hometown) && $userProfile->hometown != '' && isset($userCountry) && $userCountry->name != '')
                    <h5>Lives in {{ $userProfile->hometown.', '.$userCountry->name.' ('.$userCountry->abbr.')' }}</h5>
                @else
                    {!! (isset($userProfile) && isset($userProfile->hometown) && $userProfile->hometown != '') ? '<h5>Lives in <strong>'.$userProfile->hometown.'</strong></h5>' : ((isset($userProfile) && isset($userCountry) && $userCountry->name != '') ? '<h5> Lives in <strong>'.$userCountry->name.' ('.$userCountry->abbr.')</strong></h5>' : '') !!}
                @endif
                <small>Member since {{ \Carbon\Carbon::parse($user->created_at)->diffforhumans() }}</small>
            </div>
            <div class="col-md-4" style="padding-top: 40px">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card bg-info">
                            <div class="card-body text-light text-center">
                                <h3>{{ $user->experience }}</h3>
                                <small class="text-dark"><strong>Experience</strong></small>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card bg-info">
                            <div class="card-body text-light text-center">
                                <h3>{{ $bestReply }}</h3>
                                <small class="text-dark"><strong>Best Reply</strong></small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><h3><i class="fa fa-question"></i> My Threads</h3></div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>Slug</th>
                                <th>Title</th>
                                <th>Channel</th>
                                <th>Solved/Unsolved</th>
                                <th>Views</th>
                                <th>Created On</th>
                                <th>Last Updated On</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($discussions as $discussion)
                            <tr>
                                <td>{{ $discussion->thread_slug }}</td>
                                <td><a href="{{ url('/discussions/view/'.$discussion->thread_slug) }}">{{ $discussion->title }}</a></td>
                                <td>{{ $discussion->channel }}</td>
                                <td>{{ $discussion->status }}</td>
                                <td>{{ $discussion->views }}</td>
                                <td>{{ \Carbon\Carbon::parse($discussion->created_at)->diffforhumans() }}</td>
                                <td>{{ \Carbon\Carbon::parse($discussion->updated_at)->diffforhumans() }}</td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header"><h3><i class="fa fa-ioxhost"></i> Recent Activity</h3></div>
                    <div class="card-body">
                        @if(count($activityLogs) > 0)
                            @foreach($activityLogs as $activityLog)
                                <span><strong>{{ (Auth::user()->id == $activityLog->user_id) ? 'You' : $activityLog->username }}</strong> {{ $activityLog->type }}
                                    @if($activityLog->type == 'added' || $activityLog->type == 'updated')
                                        @php 
                                            $explode = explode('-', $activityLog->description);
                                        @endphp
                                        <strong>{{ $explode[0] }} </strong>{{ $explode[1] }}<strong> {{ $explode[2] }}</strong>
                                    @elseif($activityLog->type == 'deleted a thread')
                                        <strong>{{ \Illuminate\Support\Str::limit($activityLog->description, 60) }}</strong>
                                    @else
                                        <strong><a href="{{ $activityLog->url }}" target="_blank">{{ \Illuminate\Support\Str::limit($activityLog->description, 60) }}</a></strong>
                                    @endif
                                    </span><br>
                                <small><i class="fa fa-clock-o"></i> {{ \Carbon\Carbon::parse($activityLog->created_at)->diffforhumans() }}</small>
                                <hr>
                            @endforeach
                        @else
                            <h5><i>No Recent Activity found!</i></h5>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
