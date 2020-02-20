@extends('layouts.base')
@section('title', 'change password')
@section('appheader', "")
@section('main')
<h3 class='text-center'>change password</h3>
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
<form class='form-horizontal' action="/changepassword" method="post">
@csrf
<div class='form-group'>
<label for='password' class='col-md-2 col-md-offset-4 text-right'>old password</label>
<input class=''name="password" type="password" />
</div>
<div class='form-group'>
<label for='newpassword' class='col-md-2 col-md-offset-4 text-right'>new password</label>
<input class=''name="newpassword" type='password' />
</div>
<center><button type="submit" class='btn btn-primary '>change password</button></center>
</form>
@endsection
