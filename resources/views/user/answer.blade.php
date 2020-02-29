@extends('user.user_base')
@section('main')
    @parent

    @foreach($answers as $answer)
        @component('component.answer-title', ['answer' => $answer])
        @endcomponent
    @endforeach

@endsection
