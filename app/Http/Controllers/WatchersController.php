<?php

namespace App\Http\Controllers;

use Session;
use Auth;
use App\Watcher;
use Illuminate\Http\Request;

class WatchersController extends Controller
{
    public function watch($id){
        Watcher::create([
            'discussion_id'=> $id,
            'user_id' => Auth::id()
        ]);
        Session::flash('success', 'Watching');

        return redirect()->back();
    }

    public function unwatch($id){
        $watcher = Watcher::where('discussion_id', $id)->where('user_id', Auth::id());

        $watcher->delete();

        Session::flash('success', 'Unwatched');

        return redirect()->back();
    }
}
