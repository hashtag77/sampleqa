@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><h3>My Questions</h3></div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>Slug</th>
                            <th>Title</th>
                            <th>Channel</th>
                            <th>Solved/Unsolved</th>
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
                            <td>{{ $discussion->created_at }}</td>
                            <td>{{ $discussion->updated_at }}</td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
