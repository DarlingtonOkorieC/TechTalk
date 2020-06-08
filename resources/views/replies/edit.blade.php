@extends('layouts.app')

@section('content')
            <div class="card">
                <div class="card-header text-center">Update Reply </div>

                <div class="card-body">
                    <form class="form" action="{{ route('replies.update', ['id'  => $reply->id]) }}" method="POST">
                    {{ csrf_field() }}

                     <div class="form-group">
                        <label for="content">Update Answer</label>
                        <textarea name="content" id="content" class="form-control" cols="30" rows="10">{{ $reply->content}}</textarea>
                    </div>
                    <div class="form-group text-center">
                        <button type="submit" class="btn btn-success pull-right">
                            Update Reply
                        </button>
                    </div>
                    </form>

                </div>
            </div>



@endsection
