@extends('question.question_base')
@section('title', 'answer of '.$question->nowrecord->title)
@section('appheader')
    <script src="/static/jquery-2.1.3.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
@endsection
@section('main')
    <p class='float-right'>{{ $question->watches()->count() }} peoples is watching</p>
    @parent
    @if(Auth::check())
        <a class='btn btn-primary float-left' href='/question/{{ $question->id }}/answer'>answer</a>
        <form class="form-inline" method="post" action="/question/{{ $question->id }}/watch">
            @csrf
            @if($question->haswatch(Auth::id()))
                @method("delete")
                <button type='submit' class='btn btn-primary btn' >unwatch</button>
            @else
                <button type='submit' class='btn btn-default btn' >watch</button>
            @endif
        </form>
        @if(Auth::user()->isroot == 1)
            <a href="/question/{{ $question->id }}/lock"class='btn btn-danger btn-inline' >lock</a>
        @endif
    @endif
@endsection
