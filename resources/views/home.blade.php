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
            <div class='card-body'>
                <a href='/user/{{ $answer->user->id }}'>{{ $answer->user->username }}</a>
                <div class='row'>
                    <div class='col-md-10 col-md-offset-1'>{!! nl2br($answer->content) !!}</div>
                </div>
                <div class='pull-right align-bottom'>
                    <a  href='/question/{{ $answer->question_id }}/answer/{{ $answer->id }}'>
                        updated_at {{ $answer->updated_at }}</a></div>

                </br>
                <div class='align-bottom'>
                    <ul class='list-inline'>
                        @if(Auth::check())
                            <li>
                            <form class="" method="post" action="/answer/{{ $answer->id }}/approve">
                                @csrf
                                @if(\App\Model\User::find(Auth::id())->haveapp($answer->id))
                                    @method("delete")
                                    <button type='submit' class='btn btn-primary btn-sm' >{{ $answer->approves()->count() }} cancel upvote</button>
                                @else
                                    <button type='submit' class='btn btn-default btn-sm btn-outline-info' >{{ $answer->approves()->count() }} upvote</button>
                                @endif
                            </form>
                        @else
                            <button class='btn btn-default btn-sm' >{{ $answer->approves()->count() }}</br>upvote</button>
                        @endif
                        </li>
                        <li>
                        <a class="btn btn-default " data-toggle="collapse" href="#collapse{{ $answer->id }}" role="button" aria-expanded="false" aria-controls="collapse{{ $answer->id }}"> {{ $answer->comments()->count() }} comments</a>
                        </li>
                        @if(Auth::id() == $answer->user->id)
                            <li>
                            <a class='btn btn-sm btn-default ' href='/question/{{ $answer->question->id }}/answer/{{ $answer->id }}/edit'>edit</a>
                            </li>
                            <li>
                            <form class="form-inline " method="post" action="/question/{{ $answer->question->id }}/answer/{{ $answer->id }}">
                                @csrf
                                @method("delete")
                                <button type='submit' class='btn btn-danger btn-sm' >delete</button>
                            </form>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>

    <div class='collapse card' id='collapse{{ $answer->id }}'>
        <div class='card-body'>
            @foreach( $answer->comments as $comment )
                <div class='row'>
                    <div class='col-md-10 col-md-offset-1'>
                        <a href='/user/{{ $comment->user->id }}'>{{ $comment->user->username }}</a>:
                        {{ $comment->content }}</div>
                    @if(Auth::id() == $comment->user->id)
                        <form class="form-inline pull-right" method="post" action="/question/{{ $answer->question->id }}/answer/{{ $answer->id }}/comment/{{ $comment->id }}">
                            @csrf
                            @method("delete")
                            <button type='submit' class='btn btn-danger btn-link' >delete</button>
                        </form>
                    @endif
                </div>
            @endforeach
            <form action="/question/{{ $answer->question->id }}/answer/{{ $answer->id }}/comment" method="post">
                @csrf
                <div class='form-group'>
                    <label for='content'>comment content</label>
                    <textarea class='form-control' id='content' name='content' >
                    </textarea>
                </div>
                <button type="submit" class='btn btn-primary'>submit comment</button>
            </form>
        </div>
            </div>
        </div>
    @endforeach
@endsection
