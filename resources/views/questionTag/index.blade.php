@extends('layouts.base')
@section('title', 'create question')
@section('appheader')
    <script src="/static/jquery-2.1.3.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
@endsection
@section('main')
    <h3>{{ $record->title }}</h3>
    <ul class='list-inline'>
        @foreach($question->question_tags as $question_tag)
            <li><a href='/tag/{{ $question_tag->tag_id }}'>{{ $question_tag->tag->title }}</a>
            @if(Auth::check())
                <form class="form-inline" method="post" action="/question/{{ $question->id }}/tag/{{ $question_tag->id }}">
                    @csrf
                    @method("delete")
                    <button type='submit' class='btn btn-danger btn-sm' >x</button>
                </form>
            @endif
            </li>
        @endforeach
        @if(Auth::check())
            <li class='dropdown'>
            <a class="btn btn-default dropdown-toggle" data-toggle="dropdown" role="button" >add tag</a>
            <ul class='dropdown-menu'>
                @foreach($tags as $tag)
                    <li>
                    <form class="" method="post" action="/question/{{ $question->id }}/tag/{{ $tag->id }}">
                        @csrf
                        <button type='submit' class='btn btn-link ' >{{ $tag->title }}</button>
                    </form>
                    </li>
                @endforeach
            </ul>
            </li>
        @endif
    </ul>
    <div class='row'>
        <div class="col-md-offset-2 col-md-8">{{ $record->content }}
        </div>
    </div>
@endsection
