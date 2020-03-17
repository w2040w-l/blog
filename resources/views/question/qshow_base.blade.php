@extends('question.question_base')
@section('title', 'answer of '.$question->nowrecord->title)
@section('appheader')
    <script src="/static/jquery-2.1.3.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
@endsection
@section('main')
    <watch-show ref='watchShow' iwatch={{ $question->watches()->count()}}></watch-show>
    @parent
    <div>
        <watch-button iqid={{ $question->id }} ihavelogin={{ Auth::check()?1:0 }} ihave={{ $question->haswatch(Auth::id())?1:0 }} iwatch={{ $question->watches()->count() }}></watch-button>
        @if(Auth::check())
            <a class='btn btn-primary float-left' href='/question/{{ $question->id }}/answer'>answer</a>
            @if(Auth::user()->isroot == 1)
                <a href="/question/{{ $question->id }}/lock"class='btn btn-danger btn-inline' >lock</a>
            @endif
        @endif
    </div>
@endsection
