@extends('layouts.base')
@section('title', __('message.answers_of').' '.$tag->title)
@section('appheader', "")
@section('main')
    <h3>{{ $tag->title }}</h3>
    <div class='row'>
        <div class="col-md-offset-2 col-md-8">{{ $tag->nowrecord->content }}</div>
        @if(Auth::check())
            <edit-tag ititle='{{ $tag->title }}' icontent='{{ $tag->nowrecord->content }}'
            itid='{{ $tag->id }}'></edit-tag>
        @endif
        </br>
    </div>

    @foreach($answers as $answer)
        @component('component.answer-title', ['answer' => $answer])
        @endcomponent
    @endforeach

</div>
@endsection
