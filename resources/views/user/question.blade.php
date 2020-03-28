@extends('user.user_base')
@section('main')
    @parent
    @foreach($questions as $question)
        <div class='question' id='question-{{ $question->id }}'>
            <div class='card '>
                <div class='card-header'>
                    <a href="/question/{{ $question->id }}">
                        <h4>{{ $question->nowrecord->title }}</h4>
                    </a>
                    <ul class='list-inline'>
                        @foreach($question->question_tags as $question_tag)
                            <li class='list-inline-item'><a href='/tag/{{ $question_tag->tag_id }}'>{{ $question_tag->tag->title }}</a></li>
                        @endforeach
                    </ul>
                </div>

                <div class='card-body'>
                    <div class=''>{{ $question->nowrecord->content }}</div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
