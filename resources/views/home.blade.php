@extends('layouts.base')
@section('title', 'index')
@section('main')
    <ul class='list-inline'>
        @if($sort == 'top')
            <li><a class='btn btn-primary' href='/index/top'>highest voted answers</a></li>
        @else
            <li><a class='btn btn-default' href='/index/top'>highest voted answers</a></li>
        @endif
        @if($sort == 'now')
            <li><a class='btn btn-primary' href='/index/now'>newest answers</a></li>
        @else
            <li><a class='btn btn-default' href='/index/now'>newest answers</a></li>
        @endif
        @if($sort == 'watch')
            <li><a class='btn btn-primary' href='/index/following'>following answers</a></li>
        @else
            <li><a class='btn btn-default' href='/index/following'>following answers</a></li>
        @endif
    </ul>
    @foreach($answers as $answer)
        <div class='card '>
            <div class='card-header'>
                <a href="/question/{{ $answer->question_id }}/answer/{{ $answer->id }}">
                    <h3>{{ $answer->question->nowrecord->title }}</h3></a>
                <ul class='list-inline'>
                    @foreach($answer->question->question_tags as $question_tag)
                        <li><a href='/tag/{{ $question_tag->tag_id }}'>{{ $question_tag->tag->title }}</a></li>
                    @endforeach
                </ul>
            </div>
            <div class=' card-body'>
                <a href='/user/{{ $answer->user->id }}'>{{ $answer->user->username }}</a>
                <div class='row'>
                    <div class='col-md-10 col-md-offset-1'>{{ $answer->content }}</div>
                </div>
                <button class='btn btn-default btn-sm btn-outline-info' >{{ $answer->approves()->count() }}</br>upvote</button>
                <div class='pull-right align-bottom'>
                    <a  href='/question/{{ $answer->question_id }}/answer/{{ $answer->id }}'>
                        updated_at {{ $answer->updated_at }}</a></div>
            </div>
        </div>
    @endforeach
@endsection
