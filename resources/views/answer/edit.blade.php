@extends('question.question_base')
@section('title', 'edit answer')
@section('appheader', "")
@section('main')
    @parent
    <form action="/question/{{ $question->id }}/answer/{{ $answer->id }}" method="post">
        @csrf
        @method('PUT')
        <div class='form-group'>
            <label for='content'>answer content</label>
            <textarea class='form-control' id='content' name='content' >{{ $answer->content }}
            </textarea>
        </div>
        <button type="submit" class='btn btn-primary'>submit question</button>
    </form>
@endsection
