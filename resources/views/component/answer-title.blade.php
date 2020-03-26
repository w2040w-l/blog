<div class='answer' id='answer-{{ $answer->id }}'>
    <div class='card '>
        <div class='card-header'>
            <a href="/question/{{ $answer->question_id }}/answer/{{ $answer->id }}">
                <h4>{{ $answer->question->nowrecord->title }}</h4></a>
            <ul class='list-inline'>
                @foreach($answer->question->question_tags as $question_tag)
                    <li class='list-inline-item'><a href='/tag/{{ $question_tag->tag_id }}'>{{ $question_tag->tag->title }}</a></li>
                @endforeach
            </ul>
        </div>

        <div class='card-body'>
            <a href='/user/{{ $answer->user->id }}'>{{ $answer->user->username }}</a>
            <div class='row'>
                <div class='col-md-10 col-md-offset-1'>{!! nl2br($answer->content) !!}</div>
            </div>
            <div class='float-right align-bottom'>
                <a  href='/question/{{ $answer->question_id }}/answer/{{ $answer->id }}'>
                    updated_at {{ $answer->updated_at }}</a></div>

            </br>
            <div class='align-bottom'>
                <ul class='list-inline'>
                    @if(Auth::check())
                        <li class='list-inline-item'>
                        <div>
                            <appvote-button iansid='{{ $answer->id }}'
                            iapproves={{ $answer->approves()->count() }}
                            iappvote={{ \App\Model\User::find(Auth::id())->haveapp($answer->id)?0:1 }}
                            ></appvote-button>
                        </div>
                    @else
                        <button class='btn btn-default btn-sm' >{{ $answer->approves()->count() }}</br>upvote</button>
                    @endif
                    </li>
                    <li class='list-inline-item'>
                    <comments-button ref='cbutton{{ $answer->id }}' icount='{{ $answer->comments()->count() }}' iaid='{{ $answer->id }}'></comments-button>
                    </li>
                    @if(Auth::id() == $answer->user->id)
                        <li class='list-inline-item'>
                        <a class='btn btn-sm btn-default ' href='/question/{{ $answer->question->id }}/answer/{{ $answer->id }}/edit'>edit</a>
                        </li>
                        <li class='list-inline-item'>
                        <form class="form-inline " method="post" action="/question/{{ $answer->question->id }}/answer/{{ $answer->id }}">
                            @csrf
                            @method("delete")
                            <button type='submit' class='btn btn-danger btn-sm' >delete</button>
                        </form>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </div>

    <comments ref='comments{{ $answer->id }}' iuid='{{ Auth::id() }}' iaid='{{ $answer->id }}' iqid='{{ $answer->question->id }}' iusername='{{ Auth::user()->username }}'></comments>
</div>

