@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading"><a href="#">{{ $thread->creator->name }}</a> posted:
                        {{ $thread->title }}</div>

                    <div class="panel-body">
                        {{ $thread->body }}
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-7 col-md-offset-3">
                @foreach ($thread->replies as $reply)
                    @include('threads.replies')
                @endforeach
            </div>
        </div>
        <div class="row">
            <div class="col-md-8 col-md-offset-2" style="padding-bottom: 15rem">
                @if(auth()->check())
                    <form action="{{ $thread->path() . '/replies' }}" method="POST">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <textarea name="body" id="body" class="form-control" rows="5" placeholder="Write your reply here"></textarea>
                        </div>

                        <button class="btn btn-default">Post</button>
                    </form>
                @else
                    <div class="text-center">You must <a href="{{ route('login') }}">login</a> in order to participate on discution.</div>
                @endif

            </div>
        </div>
    </div>
@endsection
