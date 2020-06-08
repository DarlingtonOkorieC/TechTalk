<?php

namespace App;

use Auth;
use Illuminate\Database\Eloquent\Model;

class Discussion extends Model
{
    protected $fillable = [
        'title', 'content', 'user_id', 'channel_id', 'slug'
    ];

    public function channel(){
        return $this->belongsTo('App\Channel');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function replies(){
        return $this->hasMany('App\Reply');
    }
    public function watchers(){
        return $this->hasMany('App\Watcher');
    }

    public function has_been_watched(){
        $id = Auth::id();
        $watchers_id = array();

        foreach($this->watchers as $w){
            array_push($watchers_id, $w->user->id);

        }
        if(in_array( $id, $watchers_id))
        {
            return true;
        }
        else {
            return false;
        }
    }
    public function hasBestAnswer(){
        $results = false;
        foreach ($this->replies as $reply) {
            if($reply->best_answer){

                $results = true;
            break;
            }


        }
        return $results;
    }
}
