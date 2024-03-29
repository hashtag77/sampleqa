<?php

namespace App\Http\Controllers;

use App\User;
use App\Channel;
use App\Comment;
use Carbon\Carbon;
use App\Discussion;
use Illuminate\Http\Request;
use Helper;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class DiscussionsController extends Controller
{
    public function index()
    {
        $threads = Discussion::with('comments')
                            ->select('discussions.*', 'channels.channel', 'users.username', 'users.avatar')
                            ->whereNull('discussions.deleted_at')
                            ->join('channels', 'channels.id', 'discussions.channel_id')
                            ->join('users', 'users.id', 'discussions.user_id')
                            ->orderBy('discussions.updated_at', 'desc')
                            ->paginate(5);

        $channels = Channel::all();

        return view('discussions.index')->with([
            'threads'   => $threads,
            'pageTitle' => '<i class="fa fa-th-list"></i> All Threads',
            'channels'  => $channels
        ]);
    }

    public function myThreads()
    {
        $threads = Discussion::with('comments')
                        ->select('discussions.*', 'channels.channel', 'users.username', 'users.avatar')
                        ->where('discussions.user_id', Auth::user()->id)
                        ->join('channels', 'channels.id', 'discussions.channel_id')
                        ->join('users', 'users.id', 'discussions.user_id')
                        ->orderBy('discussions.updated_at', 'desc')
                        ->paginate(5);

        return view('discussions.index')->with([
            'threads'   => $threads,
            'pageTitle' => '<i class="fa fa-question"></i> My Threads'
        ]);
    }

    public function myParticipations()
    {
        $threads = Discussion::with('comments')
                        ->select('discussions.*', 'channels.channel', 'users.username', 'users.avatar')
                        ->whereNull('discussions.deleted_at')
                        ->where('comments.user_id', Auth::user()->id)
                        ->orWhere('discussions.user_id', Auth::user()->id)
                        ->join('channels', 'channels.id', 'discussions.channel_id')
                        ->join('users', 'users.id', 'discussions.user_id')
                        ->leftJoin('comments', 'comments.discussion_id', 'discussions.id')
                        ->orderBy('discussions.updated_at', 'desc')
                        ->paginate(5);  
        
        return view('discussions.index')->with([
            'threads'   => $threads,
            'pageTitle' => '<i class="fa fa-hand-paper-o"></i> My Participations'
        ]);
    }

    public function solved()
    {
        $threads = Discussion::with('comments')
                        ->select('discussions.*', 'channels.channel', 'users.username', 'users.avatar')
                        ->where('discussions.status', 'SOLVED')
                        ->join('channels', 'channels.id', 'discussions.channel_id')
                        ->join('users', 'users.id', 'discussions.user_id')
                        ->orderBy('discussions.updated_at', 'desc')
                        ->paginate(5);

        return view('discussions.index')->with([
            'threads'   => $threads,
            'pageTitle' => '<i class="fa fa-check"></i> Solved'
        ]);
    }

    public function unsolved()
    {
        $threads = Discussion::with('comments')
                        ->select('discussions.*', 'channels.channel', 'users.username', 'users.avatar')
                        ->where('discussions.status', 'UNSOLVED')
                        ->join('channels', 'channels.id', 'discussions.channel_id')
                        ->join('users', 'users.id', 'discussions.user_id')
                        ->orderBy('discussions.updated_at', 'desc')
                        ->paginate(5);

        return view('discussions.index')->with([
            'threads'   => $threads,
            'pageTitle' => '<i class="fa fa-times"></i> Unsolved'
        ]);
    }

    public function noreplies()
    {
        $threads = Discussion::with('comments')
                        ->select('discussions.*', 'channels.channel', 'users.username', 'users.avatar')
                        ->whereNull('discussions.deleted_at')
                        ->join('channels', 'channels.id', 'discussions.channel_id')
                        ->join('users', 'users.id', 'discussions.user_id')
                        ->orderBy('discussions.updated_at', 'desc')
                        ->get();

        return view('discussions.noReplies')->with([
            'threads'   => $threads,
            'pageTitle' => '<i class="fa fa-minus"></i> No Replies Yet'
        ]);
    }

    public function channel($channel_id, $channel)
    {
        $threads = Discussion::with('comments')
                        ->select('discussions.*', 'channels.channel', 'users.username', 'users.avatar')
                        ->whereNull('discussions.deleted_at')
                        ->where('discussions.channel_id', $channel_id)
                        ->join('channels', 'channels.id', 'discussions.channel_id')
                        ->join('users', 'users.id', 'discussions.user_id')
                        ->orderBy('discussions.updated_at', 'desc')
                        ->paginate(5);

        return view('discussions.index')->with([
            'threads'   => $threads,
            'pageTitle' => 'Channel: '.$channel
        ]);
    }

    public function createThread()
    {
        $channels = Channel::whereNull('deleted_at')->get();

        return view('discussions.createThread')->with([
            'channels'  => $channels
        ]);
    }

    public function storeThread(Request $request)
    {
        $threadSlug = Carbon::now()->format('YmdHis').'-'.str_slug($request->input('title'));
        Auth::user()->discussions()->create([
            'thread_slug'   => $threadSlug,
            'title'         => $request->input('title'),
            'query'         => $request->input('query'),
            'channel_id'    => $request->input('channel'),
        ]);

        $user = User::find(Auth::user()->id);
        $user->experience = $user->experience + 100;
        $user->save();

        Helper::recordActivity(
            Auth::user()->id,
            Auth::user()->username,
            'started a new conversation',
            $request->input('title'),
            '/discussions/view/'.$threadSlug
        );

        return redirect('/discussions')->with(
            'success', 'Thread has been created successfully!'
        );
    }

    public function showThread($thread_slug)
    {
        $thread = Discussion::where('thread_slug', $thread_slug)->whereNull('deleted_at')->first();

        if($thread) {

            $thread->views = $thread->views + 1;
            $thread->save();
            $channel = Channel::find($thread->channel_id);
            $user = User::find($thread->user_id);

            $comments = Comment::with('likes')
                            ->select('comments.*', 'users.username', 'users.avatar')
                            ->where('discussion_id', $thread->id)
                            ->join('users', 'users.id', 'comments.user_id')
                            ->orderBy('id', 'asc')
                            ->paginate(10);

            return view('discussions.showThread')->with([
                'thread'    => $thread,
                'channel'   => $channel->channel,
                'user'      => $user,
                'comments'  => $comments
            ]);
        } else {
            return redirect('/errors/404');
        }
    }

    public function editThread($thread_slug)
    {
        $thread = DB::table('discussions')
                        ->select('discussions.*', 'channels.channel')
                        ->where('discussions.thread_slug', $thread_slug)
                        ->join('channels', 'channels.id', 'discussions.channel_id')
                        ->first();

        $channels = Channel::whereNull('deleted_at')->get();

        return view('discussions.editThread')->with([
            'thread'    => $thread,
            'channels'  => $channels
        ]);
    }

    public function updateThread(Request $request)
    {
        $threadSlug = Carbon::now()->format('YmdHis').'-'.str_slug($request->input('title'));
        $thread                 = Discussion::find($request->input('discussion_id'));
        $thread->thread_slug    = $threadSlug;
        $thread->title          = $request->input('title');
        $thread->channel_id     = $request->input('channel');
        $thread->query          = $request->input('query');
        $thread->save();

        Helper::recordActivity(
            Auth::user()->id,
            Auth::user()->username,
            'edited a thread',
            $request->input('title'),
            '/discussions/view/'.$threadSlug
        );

        return redirect('/discussions/view/'.$threadSlug)->with('success', 'Thread updated!');
    }

    public function deleteThread($thread_slug)
    {
        $thread = Discussion::where('thread_slug', $thread_slug)->first();
        
        $user = User::find(Auth::user()->id);
        $user->experience = $user->experience - 100;
        $user->save();

        Helper::recordActivity(
            Auth::user()->id,
            Auth::user()->username,
            'deleted a thread',
            $thread->title,
            ''
        );

        $thread->delete();

        return redirect('/discussions');
    }
}
