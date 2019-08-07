<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\Country;
use App\UserProfile;
use Helper;
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

        $usersProfile = UserProfile::where('user_id', $user->id)->first();
        if($usersProfile){
            foreach($request->all() as $key => $value) {
                if($key != '_token') {
                    $field = '';
                    $data = '';
                    if($key == 'name' && $user->name != $value) {
                        $field = 'Name';
                        $data = $value;
                    } else if($key == 'twitter' && $usersProfile->twitter != $value) {
                        $field = 'Twitter Username';
                        $data = $value;
                    } else if($key == 'github' && $usersProfile->github != $value) {
                        $field = 'GitHub Username';
                        $data = $value;
                    } else if($key == 'website' && $usersProfile->website != $value) {
                        $field = 'Website';
                        $data = $value;
                    } else if($key == 'company' && $usersProfile->company != $value) {
                        $field = 'Company';
                        $data = $value;
                    } else if($key == 'job_title' && $usersProfile->job_title != $value) {
                        $field = 'Job Title';
                        $data = $value;
                    } else if($key == 'hometown' && $usersProfile->hometown != $value) {
                        $field = 'Hometown';
                        $data = $value;
                    } else if($key == 'country_id' && $usersProfile->country_id != $value) {
                        $field = 'Country';
                        $country = Country::find($value);
                        $data = $country->name.' ('.$country->abbr.')';
                    }
                    
                    if($field != '' && $data != '') {
                        Helper::recordActivity(
                            Auth::user()->id,
                            Auth::user()->username,
                            'updated',
                            $field.'-to-'.$data,
                            ''
                        );
                    }
                }
            }

            $usersProfile->website      = $request->input('website');
            $usersProfile->twitter      = $request->input('twitter');
            $usersProfile->github       = $request->input('github');
            $usersProfile->company      = Str::title($request->input('company'));
            $usersProfile->job_title    = Str::title($request->input('job_title'));
            $usersProfile->hometown     = Str::title($request->input('hometown'));
            $usersProfile->country_id   = $request->input('country_id');
        } else {
            foreach($request->all() as $key => $value) {
                if($key != '_token') {
                    $field = '';
                    $data = '';
                    if($key == 'name' && $user->name != $value) {
                        $field = 'Name';
                        $data = $value;
                    } else if($key == 'twitter') {
                        $field = 'Twitter Username';
                        $data = $value;
                    } else if($key == 'github') {
                        $field = 'GitHub Username';
                        $data = $value;
                    } else if($key == 'website') {
                        $field = 'Website';
                        $data = $value;
                    } else if($key == 'company') {
                        $field = 'Company';
                        $data = $value;
                    } else if($key == 'job_title') {
                        $field = 'Job Title';
                        $data = $value;
                    } else if($key == 'hometown') {
                        $field = 'Hometown';
                        $data = $value;
                    } else if($key == 'country_id') {
                        $field = 'Country';
                        $country = Country::find($value);
                        $data = $country->name.' ('.$country->abbr.')';
                    }
                    
                    if($field != '' && $data != '') {
                        Helper::recordActivity(
                            Auth::user()->id,
                            Auth::user()->username,
                            'added',
                            $field.'-as-'.$data,
                            ''
                        );
                    }
                }
            }

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
        $user->save();
        $usersProfile->save();

        return redirect('/profile/'.$user->username.'/edit')->with('success', 'Profile has been updated successfully!');
    }
}
