@extends('layouts.base')
@section('title', 'create question')
@section('appheader', "")
@section('main')
    <h3>{{ $record->title }}</h3>
    <ul class='inline-list'>
        @foreach($question->question_tags as $question_tag)
            <li><a href='/tag/{{ $question_tag }}'>{{ $question_tag->tag->title }}</a></li>
            @if(Auth::check())
                <form class="" method="post" action="/question/{{ $question->id }}/tag/{{ $question_tag->id }}">
                    @csrf
                    @method("delete")
                    <button type='submit' class='btn btn-danger btn-sm' >x</button>
                </form>
            @endif
        @endforeach
    </ul>
    <div class='row'>
        <div class="col-md-offset-2 col-md-8">{{ $record->content }}
        </div>
    </div>
@endsection
