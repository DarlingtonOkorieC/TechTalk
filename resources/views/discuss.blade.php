@extends('layouts.app')

@section('content')
            <div class="card">
                <div class="card-header text-center">Start new discussion</div>

                <div class="card-body">
                    <form class="form" action="{{ route('discussions.store') }}" method="POST">
                    {{ csrf_field() }}

                    <div class="form-group">
                        <label for="titel">Enter title</label>
                    <input type="text" value="{{ old('title')}}" name="title" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="channel">Pick a channel</label>
                        <select name="channel_id" id="channel_id" class="form-control">
                            @foreach ($channels as $channel)
                            <option value="{{ $channel->id }}">{{ $channel->title }}</option>
                            @endforeach
                        </select>
                    </div>
                    <h6 class="text-center text-muted text-sm">To format code blocks, please add ``` between your code blocks</h6>
                    <div class="form-group">
                        <label for="content">Ask a question</label>
                        <textarea name="content" id="content" class="form-control" cols="30" rows="10">{{ old('content')}}</textarea>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success pull-right">
                            Create discussion
                        </button>
                    </div>
                    </form>

                </div>
            </div>



@endsection
