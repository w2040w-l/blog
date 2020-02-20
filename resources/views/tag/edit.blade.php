@extends('layouts.base')
@section('title', 'edit tag')
@section('appheader', "")
@section('main')
    <form action="/tag/{{ $tag->id }}" method="post">
        @csrf
        @method('PUT')
        <div class='form-group'>
            <label for='title'>tag name</label>
            <p>{{ $tag->title }}</p>
        </div>
        <div class='form-group'>
            <label for='content'>tag content</label>
            <textarea class='form-control' id='content' name='content' >{{ $record->content }}
            </textarea>
        </div>
        <button type="submit" class='btn btn-primary'>change tag</button>
    </form>
@endsection
