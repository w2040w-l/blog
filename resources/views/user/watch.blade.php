@extends('user.user_base')
@section('main')
@parent
@foreach($watches as $watch)
<div class='bg-info'>
<a href="/question/{{ $watch->question->id }}">
<h3>{{ $watch->question->nowrecord->title }}</h3></a>
<div class='row'>
<div class='col-md-10 col-md-offset-1'>{{ $watch->question->nowrecord->content }}</div>
</div>
</div>
@endforeach
@endsection
