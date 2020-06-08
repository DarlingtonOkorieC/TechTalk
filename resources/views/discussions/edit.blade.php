@extends('layouts.app')

@section('content')
            <div class="card">
                <div class="card-header text-center">Edit Discussion: {{ $discussion->name }} </div>

                <div class="card-body">
                    <form class="form" action="{{ route('discussions.update', ['id'  => $discussion->id]) }}" method="POST">
                    {{ csrf_field() }}

                    <div class="form-group">

                    <h5>Title: {{$discussion->title}}</h5>
                    </div>
                    <div class="form-group">
                        <label for="content">Update Question</label>
                        <textarea name="content" id="content" class="form-control" cols="30" rows="10">{{ $discussion->content}}</textarea>
                    </div>
                    <div class="form-group text-center">
                        <button type="submit" class="btn btn-success pull-right">
                            Update discussion
                        </button>
                    </div>
                    </form>

                </div>
            </div>



@endsection
