<?php

namespace App\Http\Controllers;

use App\Like;
use App\Comment;
use App\Discussion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentsController extends Controller
{
    public function redirectTo($param)
    {
        return redirect('/discussions/view/'.$param);
    }

    public function postComment(Request $request)
    {
        $comment = new Comment();
        $comment->discussion_id = $request->input('discussion_id');
        $comment->user_id = Auth::user()->id;
        $comment->comment = $request->input('comment');
        $comment->save();

        return $this->redirectTo($request->input('thread_slug'));
    }

    public function likeComment($comment_id)
    {
        $likes = Like::where('comment_id', $comment_id)
                    ->where('user_id', Auth::user()->id)
                    ->whereNull('deleted_at')
                    ->first();

        if($likes) {
            if($likes->likes == 0) {
                $likes->likes = $likes->likes + 1;
                $likes->save();
            } elseif($likes->likes == 1) {
                $likes->delete();
            }
        } else {
            $like               = new Like();
            $like->comment_id   = $comment_id;
            $like->user_id      = Auth::user()->id;
            $like->likes        = 1;
            $like->save();
        }

        $likesCount = Comment::with('likes')->where('comments.id', $comment_id)->get();

        return response()->json([
            'likesCount' => $likesCount
        ], 200);
    }

    public function helpfulComment($comment_id, $thread_slug)
    {
        $comment = Comment::find($comment_id);
        $comment->helpful = 1;
        $comment->save();

        $thread = Discussion::find($comment->discussion_id);
        $thread->status = "SOLVED";
        $thread->save();

        return $this->redirectTo($thread_slug); 
    }

    public function notHelpfulComment($comment_id, $thread_slug)
    {
        $comment = Comment::find($comment_id);
        $comment->helpful = 0;
        $comment->save();

        $thread = Discussion::where('id', $comment->discussion_id)->first();
        $thread->status = "UNSOLVED";
        $thread->save();

        return $this->redirectTo($thread_slug);
    }

    public function editComment($comment_id, $thread_slug)
    {
        $comment = Comment::find($comment_id);

        return view('comments.edit')->with([
            'thread_slug'   => $thread_slug,
            'comment'       => $comment
        ]);
    }

    public function updateComment(Request $request)
    {
        $comment = Comment::find($request->input('comment_id'));
        $comment->comment = $request->input('comment');
        $comment->save();

        return $this->redirectTo($request->input('thread_slug'));
    }

    public function deleteComment($comment_id, $thread_slug)
    {
        $comment = Comment::find($comment_id);
        $comment->delete();

        return $this->redirectTo($thread_slug);
    }
}
