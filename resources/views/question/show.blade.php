@extends('question.qshow_base')
@section('appheader')
    @parent
@endsection

@section('main')
    @parent

    @foreach($answers as $answer)
        @component('component.answer',['question' => $question, 'answer' => $answer])
        @endcomponent
    @endforeach
@endsection
