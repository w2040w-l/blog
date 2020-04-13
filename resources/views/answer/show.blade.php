@extends('question.qshow_base')
@section('main')
    @parent
    @component('component.answer',['question'=> $question,'answer' => $answer])
    @endcomponent
    <a class='btn btn-primary center-block' href='/question/{{ $question->id }}'>{{ __('message.more_answers') }}</a>
@endsection
