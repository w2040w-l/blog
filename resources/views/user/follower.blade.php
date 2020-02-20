@extends('user.user_base')
@section('main')
@parent
@foreach($follows as $follower)
<div class='bg-info'>
<a href="/user/{{ $follower->follower->id }}">
<h3>{{ $follower->follower->username }}</h3></a>
</div>
@endforeach
@endsection
