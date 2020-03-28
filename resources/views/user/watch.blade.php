@extends('user.user_base')
@section('main')
    @parent
    @foreach($watches as $watch)
        <div class='question' id='question-{{ $watch->question->id }}'>
            <div class='card '>
                <div class='card-header'>
                    <a href="/question/{{ $watch->question->id }}">
                        <h4>{{ $watch->question->nowrecord->title }}</h4>
                    </a>
                    <ul class='list-inline'>
                        @foreach($watch->question->question_tags as $question_tag)
                            <li class='list-inline-item'><a href='/tag/{{ $question_tag->tag_id }}'>{{ $question_tag->tag->title }}</a></li>
                        @endforeach
                    </ul>
                </div>

                <div class='card-body'>
                    <div class=''>{{ $watch->question->nowrecord->content }}</div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
