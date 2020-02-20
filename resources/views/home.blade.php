@extends('layouts.base')
@section('title', 'index')
@section('appheader')
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
@endsection
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
