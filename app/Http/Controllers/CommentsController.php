<?php

namespace App\Http\Controllers;

use App\Like;
use App\Comment;
use App\Discussion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentsController extends Controller
{
    public function postComment(Request $request)
    {
        $comment = new Comment();
        $comment->discussion_id = $request->input('discussion_id');
        $comment->user_id = Auth::user()->id;
        $comment->comment = $request->input('comment');
        $comment->save();

        return redirect('/discussions/view/'.$request->input('thread_slug'));
    }

    public function likeComment($comment_id, $thread_slug)
    {
        $likes = Like::where('comment_id', $comment_id)->where('user_id', Auth::user()->id)->first();

        if($likes) {
            if($likes->likes == 0) {
                $likes->likes = $likes->likes + 1;
            } elseif($likes->likes == 1) {
                $likes->likes = $likes->likes - 1;
            }
            $likes->save();
        } else {
            $like               = new Like();
            $like->comment_id   = $comment_id;
            $like->user_id      = Auth::user()->id;
            $like->likes        = 1;
            $like->save();
        }

        return redirect('/discussions/view/'.$thread_slug);
    }

    public function helpfulComment($comment_id, $thread_slug)
    {
        $comment = Comment::find($comment_id);
        $comment->helpful = 1;
        $comment->save();

        $thread = Discussion::find($comment->discussion_id);
        $thread->status = "SOLVED";
        $thread->save();

        return redirect('/discussions/view/'.$thread_slug);
    }
}
