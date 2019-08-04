@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="jumbotron">
        <div class="row">
            <div class="col-md-6">
                <h2 style="display:inline-block; margin-right: 10px"><strong>{{ $user->name }}</strong></h2>
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
            <div class="col-md-6" style="justify-content: right">
                <div class="row">
                    <div class="col-md-3">
                        <div class="card bg-info">
                            <div class="card-body text-light text-center">
                                <h1>test</h1>
                                <small class="text-dark"><strong>Experience</strong></small>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card bg-info">
                            <div class="card-body text-light text-center">
                                <h1>{{ $bestReply }}</h1>
                                <small class="text-dark"><strong>Best Reply</strong></small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h3>My Threads</h3></div>
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
                <div class="card-header"><h3>Recent Activity</h3></div>
                <div class="card-body">
                    <table class="table table-striped">
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
