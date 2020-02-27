@extends('layouts.base')
@section('title', 'create question')
@section('appheader', "")
@section('main')
    <h3>{{ $record->title }}</h3>
    <ul class='list-inline'>
        @foreach($question->question_tags as $question_tag)
            <li class='list-inline-item'><a href='/tag/{{ $question_tag->tag_id }}'>{{ $question_tag->tag->title }}</a></li>
        @endforeach
        <li class='list-inline-item'><a href='/question/{{ $question->id }}/tag'>edit tag</a></li>
    </ul>
    <div class='row'>
        <div class="col-md-offset-2 col-md-8">{{ $record->content }}
            <a class='btn btn-link float-right' href='/question/{{ $question->id }}/edit'>change</a>
        </div>
    </div>
@endsection
