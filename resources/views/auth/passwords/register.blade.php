@extends('layouts.base')
@section('title', 'register')
@section('appheader', "")
@section('main')
<p>register</p>
@if( $errors->any() )
<div class='alert alert-danger'>
<ul>
@foreach( $errors->all() as $error )
<li>{{ $error }}</li>
@endforeach
</ul>
</div>
@endif
<form action="/register" method="post">
@csrf
username:<input name="username" type="text" /><br/>
password:<input name="password" type='password' /><br />
<input type="submit" />
</form>
@endsection
