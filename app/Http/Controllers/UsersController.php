<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UsersController extends Controller
{
    public function profile($username)
    {
        $user = User::where('username', $username)->first();

        $threads = DB::table('discussions')
                        ->select('discussions.*', 'channels.channel')
                        ->where('discussions.user_id', $user->id)
                        ->join('channels', 'channels.id', 'discussions.channel_id')
                        ->orderBy('id', 'desc')
                        ->get();

        return view('dashboard')->with([
            'discussions'   => $threads
        ]);
    }
}
