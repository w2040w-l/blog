@extends('layouts.base')
@section('title', 'create tag')
@section('appheader', "")
@section('main')
    <form action="/tag" method="post">
        @csrf
        <div class='form-group'>
            <label for='title'>tag name</label>
            <input type='text' class='form-control' id='title' name='title' />
        </div>
        <div class='form-group'>
            <label for='content'>tag intro</label>
            <textarea class='form-control' id='content' name='content' >
            </textarea>
        </div>
        <button type="submit" class='btn btn-primary'>submit tag</button>
    </form>
@endsection
