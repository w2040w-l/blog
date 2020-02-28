@extends('question.qshow_base')
@section('main')
    @parent
    @component('component.answer',['question'=> $question,'answer' => $answer])
    @endcomponent
    <a class='btn btn-primary center-block' href='/question/{{ $question->id }}'>more answer</a>
@endsection
