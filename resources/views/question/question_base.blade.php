@extends('layouts.base')
@section('title', 'create question')
@section('appheader', "")
@section('main')
    <h3>{{ $record->title }}</h3>
    <ul class='list-inline'>
        @foreach($question->question_tags as $question_tag)
            <li class='list-inline-item'><a href='/tag/{{ $question_tag->tag_id }}'>{{ $question_tag->tag->title }}</a></li>
        @endforeach
    </ul>
    <div class='row'>
        <div class="col-md-offset-2 col-md-8">{!! nl2br($record->content) !!}
            @if(Auth::check())
                <edit-question ititle='{{ $record->title }}' idesc='{{$record->content}}' iqid={{ $question->id }}></edit-question>
            @endif
        </div>
    </div>
@endsection
