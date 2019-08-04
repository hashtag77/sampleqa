@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="jumbotron">
        <div class="row">
            <div class="col-md-6">
                <h2>{{ $user->name }}</h2>
                <h4>{{ $user->username }}</h4>
                <p>Member since {{ \Carbon\Carbon::parse($user->created_at)->diffforhumans() }}</p>
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
    <div class="row">
        <div class="col-md-3">
            <div class="card bg-success">
                <div class="card-body text-light">
                    <small><strong>Total Views</strong></small>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card bg-warning">
                <div class="card-body">
                    <small><strong>Total Views</strong></small>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card bg-secondary">
                <div class="card-body text-light">
                    <small><strong>Total Views</strong></small>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card bg-dark">
                <div class="card-body text-light">
                    <small><strong>Total Views</strong></small>
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
