@extends('layouts.app')

@section('content')
<form method="POST" action="{{ url('/profile/update') }}" enctype="multipart/form-data">
  @csrf
  <div class="container col-md-8">
      <div class="card">
          <div class="card-header">
              <h3>Edit Profile</h3>
          </div>
          <div class="card-body">
              <div class="form-group">
                <div class="row">
                  <div class="col-md-12 text-center">
                    <img src="/storage/avatars/{{ $usersData->avatar }}" style="width: 200px; height: 200px; border-radius: 110px">
                    <input type="file" class="form-control-file" name="avatar" id="avatarFile" aria-describedby="fileHelp">
                  </div>
                </div>    
                <div class="row">
                  <div class="col-md-6">
                    <label for="name">Name</label>
                    <input type="text" name="name" class="form-control" value="{{ $usersData->name }}" placeholder="What is your name?" required>
                  </div>
                  <div class="col-md-6">
                    <label for="name">Username</label>
                    <input type="text" name="username" class="form-control" value="{{ $usersData->username }}" disabled>
                  </div>
                </div>
                <br>
                <div class="row">
                  <div class="col-md-6">
                    <label for="email">Email</label>
                    <input type="email" name="email" class="form-control" value="{{ $usersData->email }}" disabled>
                  </div>
                  <div class="col-md-6">
                    <label for="website">Website</label>
                    <input type="text" name="website" class="form-control" value="{{ isset($usersProfile) && isset($usersProfile->website) && $usersProfile->website != '' ? $usersProfile->website : '' }}" placeholder="Any website you own?">
                  </div>
                </div>
                <br>
                <div class="row">
                  <div class="col-md-6">
                    <label for="twitter">Twitter Username</label>
                    <input type="text" name="twitter" class="form-control" value="{{ isset($usersProfile) && isset($usersProfile->twitter) && $usersProfile->twitter != '' ? $usersProfile->twitter : '' }}" placeholder="Let's add you twitter account...">
                  </div>
                  <div class="col-md-6">
                    <label for="github">GitHub Username</label>
                    <input type="text" name="github" class="form-control" value="{{ isset($usersProfile) && isset($usersProfile->github) && $usersProfile->github != '' ? $usersProfile->github : '' }}" placeholder="How about adding github profile too?">
                  </div>
                </div>
                <br>
                <div class="row">
                  <div class="col-md-6">
                    <label for="company">Company</label>
                    <input type="text" name="company" class="form-control" value="{{ isset($usersProfile) && isset($usersProfile->company) && $usersProfile->company != '' ? $usersProfile->company : '' }}" placeholder="Where do you work?">
                  </div>
                  <div class="col-md-6">
                    <label for="job_title">Job Title</label>
                    <input type="text" name="job_title" class="form-control" value="{{ isset($usersProfile) && isset($usersProfile->job_title) && $usersProfile->job_title != '' ? $usersProfile->job_title : '' }}" placeholder="What's your designation? ex: Developer, Designer, etc.">
                  </div>
                </div>
                <br>
                <div class="row">
                  <div class="col-md-6">
                    <label for="hometown">Hometown</label>
                    <input type="text" name="hometown" class="form-control" value="{{ isset($usersProfile) && isset($usersProfile->hometown) && $usersProfile->hometown != '' ? $usersProfile->hometown : '' }}" placeholder="Where do you live?">
                  </div>
                  <div class="col-md-6">
                    <label for="country_id">Country</label>
                    <select class="form-control" name="country_id" required>
                      <option value="">Select Country</option>
                      @foreach($countries as $country)
                        <option value="{{ $country->id }}" {{ (isset($usersProfile) && $country->id == $usersProfile->country_id) ? 'selected' : '' }}>{{ $country->name }}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                <br>
                <input type="submit" class="btn btn-success" value="Update Profile">
              </div>
          </div>
      </div>
  </div>
</form>
@endsection