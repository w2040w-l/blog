@extends('layouts.base')
@section('title', 'register')
@section('appheader', "")
@section('main')
<h3 class='text-center'>register</h3>
</br>
@if( $errors->any() )
<div class='alert alert-danger'>
<ul>
@foreach( $errors->all() as $error )
<li>{{ $error }}</li>
@endforeach
</ul>
</div>
@endif
<form class='form-horizontal' action="/register" method="post">
@csrf
<div class='form-group'>
<label for='username' class='col-md-2 col-md-offset-4 text-right'>username</label>
<input class=''name="username" type="text" />
</div>
<div class='form-group'>
<label for='password' class='col-md-2 col-md-offset-4 text-right'>password</label>
<input class=''name="password" type='password' />
</div>
<center><button type="submit" class='btn btn-primary '>register</button></center>
</form>
@endsection
