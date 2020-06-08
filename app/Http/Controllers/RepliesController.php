<?php

namespace App\Http\Controllers;

use App\User;
use Session;
use Auth;
use App\Like;
use App\Reply;
use Illuminate\Http\Request;

class RepliesController extends Controller
{
    public function like($id){;

        Like::create([
            'reply_id' => $id,
            'user_id' => Auth::id(),
        ]);

        $like = Like::where('user_id', Auth::id())->first();

        $user = $like->user->name;

        Session::flash('success', 'You liked'. ' '. $user  .' '. 'post');

        return redirect()->back();
    }

    public function unlike($id){
        $unlike = Like::where('reply_id', $id)->where('user_id', Auth::id())->first();

        $unlike->delete();

        $user = $unlike->user->name;
        Session::flash('success', 'You unliked' .' '. $user  .' '.'post');

        return redirect()->back();
    }
    public function best_answer($id)
    {
        $reply = Reply::find($id);

        $reply->best_answer = 1;
        $reply->save();

        $reply->user->points += 20;

        $reply->user->save();

        Session::flash('success', 'Marked!');

        return redirect()->back();

    }
    public function edit($id){
        return view('replies.edit', ['reply' => Reply::find($id)]);

    }

    public function update($id){
        $this->validate(request(),[
            'content' => 'required'
        ]);
        $reply = Reply::find($id);

        $reply->content = request()->content;

        $reply->save();

        Session::flash('success', 'Reply Updated');

        return redirect()->route('discussion',['slug' =>  $reply->discussion->slug]);
    }
}
