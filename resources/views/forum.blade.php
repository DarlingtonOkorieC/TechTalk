@extends('layouts.app')

@section('content')
                @foreach ($discussions as $d)
                    <div class="card">
                        <div class="card-header card-table">
                            <img src="{{ asset('avatars/avatar.png') }}" alt="" width="40px" height="40px">&nbsp;&nbsp;&nbsp;
                            <span>{{ $d->user->name }}, <b>{{ $d->created_at->diffForHumans() }}</b></span>
                           @if ($d->hasBestAnswer())
                           <span class="btn btn-text-right btn-success btn-sm">Closed</span>
                           @else
                           <span class="btn btn-text-right btn-danger btn-sm">Open</span>

                           @endif
                            <div class="text-right">
                                <a href="{{ route('discussion', ['slug' => $d->slug]) }}" class="btn btn-sm btn-dark text-right">View</a>

                            </div>

                        </div>
                        <div class="card-body">
                            <h4 class="text-center">
                                <b>{{ $d->title }}</b>
                            </h4>
                            <p class="text-center">
                                 {{ str_limit($d->content, 50) }}
                            </p>

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
                @endforeach

{{ $discussions->links() }}


@endsection
