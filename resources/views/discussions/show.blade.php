@extends('layouts.app')

@section('content')
                    <div class="card">
                        <div class="card-header card-table">
                            <img src="{{ $d->user->avatar }}" alt="" width="40px" height="40px">&nbsp;&nbsp;&nbsp;
                            <img src="{{ asset('avatars/avatar.png') }}" alt="" width="40px" height="40px">&nbsp;&nbsp;&nbsp;
                            <span>{{ $d->user->name }}, <b>(Current points: {{ $d->user->points }} )</b></span>

                           @if ($d->hasBestAnswer())
                           <span class="btn btn-text-right btn-success btn-sm">Closed</span>
                           @else
                           <span class="btn btn-text-right btn-danger btn-sm">Open</span>
                            @if (Auth::id() == $d->user->id)
                            @if (!$d->hasBestAnswer())
                            <a href="{{ route('discussion.edit', ['slug' => $d->slug])}}" class="btn btn-sm btn-info">Edit Discussion</a>
                            @endif

                            @endif
                           @endif
                            <div class="text-right">
                                @if($d->has_been_watched())
                                <a href="{{ route('discussion.unwatch', ['id' => $d->id])}}" class="btn btn-dark">UnWatch</a>
                            @else
                            <a href="{{ route('discussion.watch', ['id' => $d->id])}}" class="btn btn-dark">Watch</a>
                            @endif
                            </div>

                        </div>
                        <div class="card-body">
                            <h4 class="text-center">
                                <b>{{ $d->title }}</b>
                            </h4>
                            <hr>
                            <h6 class="text-center text-muted text-sm">To format code blocks, please add ``` between your code blocks</h6>
                            <p class="text-center">
                              {!!  Markdown::convertToHtml($d->content)  !!}
                            </p>
                            <hr>
                            @if ($best_answer)
                            <div class="text-center" style="padding:30px">
                                <h4 class="text-center">Best answer</h4>
                                <div class="card card-success">
                                    <div class="card-heading" style="background: #485f51">
                                        <img src="{{ $best_answer->user->avatar}}" alt="" width="40px" height="40">
                                        <span class="text-light">{{ $d->user->name}} (Current points: <b>{{ $best_answer->user->points }} )</b></span>
                                    </div>
                                    <div class="card-body">
                                        {!!  Markdown::convertToHtml($best_answer->content)  !!}}
                                    </div>
                                </div>
                            </div>
                            @endif

                        </div>
                        <div class="card-footer">
                            <p>
                                {{ $d->replies->count() }} Replies
                            </p>
                            <div class="text-right">
                            <a href="{{ route('channel', ['slug' => $d->channel->slug]) }}" class="btn btn-dark btn-sm"> {{ $d->channel->title   }}</a>
                            </div>

                        </div>
                    </div>
                    <br>
                    <h5>Replies</h5>
                    @foreach ($d->replies as $r)
                    <div class="card">
                        <div class="card-header card-table">
                            <img src="{{ $r->user->avatar }}" alt="" width="40px" height="40px"> &nbsp;&nbsp;&nbsp;
                            <img src="{{ asset('avatars/avatar.png') }}" alt="" width="40px" height="40px">
                            <span>{{ $r->user->name }} <b>(Current points: {{ $r->user->points }} )</b>, <b>{{ $r->created_at->diffForHumans() }}</b></span>
                            @if (!$best_answer)
                        @if (Auth::id() == $d->user->id)
                        <a href="{{ route('discussion.best.answer', ['id' => $r->id])}}" class="btn btn-sm btn-info text-right">Mark as best answer</a>

                        @endif
                            @if (Auth::id()== $r->user->id )
                            @if (!$r->best_answer)
                            <a href="{{ route('replies.edit', ['id' => $r->id])}}" class="btn btn-sm btn-info text-right">Edit Reply</a>

                            @endif
                            @endif
                            @endif

                        </div>
                        <hr>
                        <div class="card-body">
                            <h6 class="text-center text-muted text-sm">To format code blocks, please add ``` between your code blocks</h6>
                            <p class="text-center">
                                 {!!  Markdown::convertToHtml($r->content)  !!}}
                            </p>

                        </div>
                        <div class="card-footer">
                            <p>
                                @if($r->is_liked_by_auth_user())

                            <a href="{{ route('reply.unlike', ['id' => $r->id] ) }}" class="btn btn-sm btn-danger">Unlike</a><span class="badge">{{ $r->likes->count() }} Likes</span>

                                @else

                            <a href="{{ route('reply.like', ['id' => $r->id ])  }}" class="btn btn-sm btn-success">Like</a><span class="badge">{{ $r->likes->count() }} Likes</span>
                                @endif
                            </p>
                        </div>
                    </div>
                    @endforeach


                    <div class="card">
                        <div class="card-body">


                            @if (Auth::check())
                            <form action="{{ route('discussions.reply', ['id' => $d->id]) }}" method="POST">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="reply"><b>Leave a reply</b></label>
                                    <textarea name="content" id="content" cols="20" rows="10" class="form-control"></textarea>
                                </div>
                                <div class="form-group">
                                    <div class="text-right">
                                        <button type="submit" class="btn btn-dark">Leave a reply</button>
                                    </div>

                            @else
                                    <div class="text-center">
                                        <h4>Sign in or signup to leave a reply</h4>
                                    </div>
                            @endif

                                </div>
                            </form>
                        </div>
                    </div>
@endsection

