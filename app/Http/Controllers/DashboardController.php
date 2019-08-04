<?php

namespace App\Http\Controllers;

use DB;
use Auth;
use App\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index($username)
    {
        $user = User::where('username', $username)->first();

        $threads = DB::table('discussions')
                        ->select('discussions.*', 'channels.channel')
                        ->where('discussions.user_id', $user->id)
                        ->join('channels', 'channels.id', 'discussions.channel_id')
                        ->orderBy('id', 'desc')
                        ->get();

        $bestReply = DB::table('comments')
                            ->select('comments.discussion_id as cd_id', 'discussions.id as d_id', 'discussions.status as status')
                            ->where('comments.user_id', $user->id)
                            ->where('discussions.status', 'SOLVED')
                            ->where('discussions.user_id', '!=', $user->id)
                            ->join('discussions', 'discussions.id', 'comments.discussion_id')
                            ->get();

        return view('dashboard.index')->with([
            'user'          => $user,
            'discussions'   => $threads,
            'bestReply'     => count($bestReply)
        ]);
    }
}
