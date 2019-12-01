<?php

namespace App\Http\Controllers;

use Auth;
use Session;
use App\Like;
use App\Reply;
use Illuminate\Http\Request;
use App\Notifications\NewReplyAdded;
use App\Discussion;

class RepliesController extends Controller
{
    public function like($id)
    {
        Like::create([
            'reply_id' => $id,
            'user_id' => Auth::id()
        ]);
 
        Session::flash('success', 'You liked the reply.');

        return redirect()->back();
    }
    
    public function unlike($id)
    {
        $like = Like::where('reply_id', $id)->where('user_id', Auth::id())->first();

        $like->delete();

        Session::flash('success', 'You unliked the reply.');

        return redirect()->back();
    }

    public function best_answer($id)
    {
        $reply = Reply::find($id);

        $reply->best_answer = 1;
        $reply->save();

        $reply->user->points += 10;
        $reply->user->save();

        Session::flash('success', 'Reply has been marked as the best answer.');
        return redirect()->back();
    }

    public function store(CreateReplyRequest $request, Discussion $discussion){

        auth()->user()->replies()->create([

            'content' => $request->content,

            'discussion_id' =>$discussion->id

 
        ]);

        $discussion->author->notify(new NewReplyAdded($discussion));

        session()->flash('success', 'Reply added.');

        return redirect()->back();

    }
}
