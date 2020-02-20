@extends('layouts.base')
@section('title', 'answers of '.$tag->title)
@section('appheader', "")
@section('main')
<h3>{{ $tag->title }}</h3>
<div class='row'>
<div class="col-md-offset-2 col-md-8">{{ $tag->nowrecord->content }}</div>
<a href='/tag/{{ $tag->id }}/edit' class='btn btn-primary push-left'>edit tag</a>
</br>
@foreach($answers as $answer)
<div class='bg-info'>
<a href="/question/{{ $answer->question_id }}/answer/{{ $answer->id }}">
<h3>{{ $answer->question->nowrecord->title }}</h3></a>
<div class='row'>
<a href='/user/{{ $answer->user->id }}'>{{ $answer->user->username }}</a></br>
<div class='col-md-10 col-md-offset-1'>{{ $answer->content }}</div>
<a class='pull-right' href='/question/{{ $answer->question->id }}/answer/{{ $answer->id }}'>
updated_at {{ $answer->updated_at }}</a>
</div>
</div>
@endforeach
@endsection
