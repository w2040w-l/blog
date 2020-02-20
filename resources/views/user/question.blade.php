@extends('user.user_base')
@section('main')
@parent
@foreach($questions as $question)
<div class='bg-info'>
<a href="/question/{{ $question->id }}">
<h3>{{ $question->nowrecord->title }}</h3></a>
<div class='row'>
<div class='col-md-10 col-md-offset-1'>{{ $question->nowrecord->content }}</div>
</div>
</div>
@endforeach
@endsection
