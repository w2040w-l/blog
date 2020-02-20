@extends('layouts.base')
@section('title', 'create question')
@section('appheader', "")
@section('main')
<form action="/register" method="post">
@csrf
<div class='form-group'>
    <label for='title'>question title</label>
    <input type='text' class='form-control' id='title' name='title' />
</div>
<div class='form-group'>
    <label for='content'>question content</label>
    <textarea class='form-control' id='content' name='content' >
    </div>
    <button type="submit" class='btn btn-primary'>submit question</button>
</form>
@endsection
