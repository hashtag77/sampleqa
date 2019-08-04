<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\Country;
use App\UserProfile;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UsersController extends Controller
{
    public function editProfile($username)
    {
        $user_id = Auth::user()->id;
        $usersData = User::find($user_id);
        $countries = Country::all();

        return view('profile.editProfile')->with([
            'usersData'     => $usersData,
            'usersProfile'  => $usersData->userProfile,
            'countries'     => $countries
        ]);
    }

    public function updateProfile(Request $request)
    {
        $user = User::find(Auth::user()->id);
        $user->name = $request->input('name');
        $user->save();

        $usersProfile = UserProfile::where('user_id', $user->id)->first();
        if($usersProfile){
            $usersProfile->website      = $request->input('website');
            $usersProfile->twitter      = $request->input('twitter');
            $usersProfile->github       = $request->input('github');
            $usersProfile->company      = Str::title($request->input('company'));
            $usersProfile->job_title    = Str::title($request->input('job_title'));
            $usersProfile->hometown     = Str::title($request->input('hometown'));
            $usersProfile->country_id   = $request->input('country_id');
        } else {
            $usersProfile = new UserProfile();
            $usersProfile->user_id      = $user->id;
            $usersProfile->website      = $request->input('website');
            $usersProfile->twitter      = $request->input('twitter');
            $usersProfile->github       = $request->input('github');
            $usersProfile->company      = Str::title($request->input('company'));
            $usersProfile->job_title    = Str::title($request->input('job_title'));
            $usersProfile->hometown     = Str::title($request->input('hometown'));
            $usersProfile->country_id   = $request->input('country_id');
        }
        $usersProfile->save();

        return redirect('/profile/'.$user->username.'/edit')->with('success', 'Profile has been updated successfully!');
    }
}
