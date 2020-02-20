@extends('layouts.base')
@section('title', 'create question')
@section('appheader', "")
@section('main')
    <form action="/question/{{ $question->id }}" method="post">
        @csrf
        @method('PUT')
        <div class='form-group'>
            <label for='title'>question title</label>
            <input type='text' class='form-control' id='title' name='title' value='{{ $record->title }}'/>
        </div>
        <div class='form-group'>
            <label for='content'>question content</label>
            <textarea class='form-control' id='content' name='content' >{{ $record->content }}
            </textarea>
        </div>
        <button type="submit" class='btn btn-primary'>change question</button>
    </form>
@endsection
