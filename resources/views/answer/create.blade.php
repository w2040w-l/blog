@extends('question.question_base')
@section('title', 'add answer')
@section('appheader', "")
@section('main')
    @parent
    <form action="/question/{{ $question->id }}/answer" method="post">
        @csrf
        <div class='form-group'>
            <label for='content'>answer content</label>
            <textarea class='form-control' id='content' name='content' >
            </textarea>
        </div>
        <button type="submit" class='btn btn-primary'>submit question</button>
    </form>
@endsection
