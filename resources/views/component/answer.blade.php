
    <div class='answer'>
        <div class='card '>
            <div class=' card-body'>
                <a href='/user/{{ $answer->user->id }}'>{{ $answer->user->username }}</a>
                <div class='row'>
                    <div class='col-md-10 col-md-offset-1'>{!! nl2br($answer->content) !!}</div>
                </div>
                <div class='float-right'>
                    <a  href='/question/{{ $question->id }}/answer/{{ $answer->id }}'>
                        updated_at {{ $answer->updated_at }}</a>
                </div>
                </br>

                <div class='align-bottom'>
                    <ul class='list-inline'>
                        <li class='list-inline-item'>
                        <appvote-button iansid='{{ $answer->id }}'
                        iapproves={{ $answer->approves()->count() }}
                        iappvote={{ \App\Model\User::find(Auth::id())->haveapp($answer->id)?0:1 }}
                        ></appvote-button>
                        </li>
                        <li class='list-inline-item'>
                        <a class="btn btn-default btn-sm" data-toggle="collapse" href="#collapse{{ $answer->id }}" role="button" aria-expanded="false" aria-controls="collapse{{ $answer->id }}"> {{ $answer->comments()->count() }} comments</a>
                        </li>
                        @if(Auth::id() == $answer->user->id)
                            <li class='list-inline-item'>
                            <a class='btn btn-sm btn-default ' href='/question/{{ $question->id }}/answer/{{ $answer->id }}/edit'>edit</a>
                            </li>
                            <li class='list-inline-item'>
                            <form class="form-inline " method="post" action="/question/{{ $question->id }}/answer/{{ $answer->id }}">
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

        <div class='collapse card' id='collapse{{ $answer->id }}'>
            <div class='card-body'>
                @foreach( $answer->comments as $comment )
                    <div class='row'>
                        <div class='col-md-10 col-md-offset-1'>
                            <a href='/user/{{ $comment->user->id }}'>{{ $comment->user->username }}</a>:
                            {{ $comment->content }}</div>
                        @if(Auth::id() == $comment->user->id)
                            <form class="form-inline float-right" method="post" action="/question/{{ $question->id }}/answer/{{ $answer->id }}/comment/{{ $comment->id }}">
                                @csrf
                                @method("delete")
                                <button type='submit' class='btn btn-danger btn-link' >delete</button>
                            </form>
                        @endif
                    </div>
                @endforeach
                <form action="/question/{{ $question->id }}/answer/{{ $answer->id }}/comment" method="post">
                    @csrf
                    <div class='form-group'>
                        <label for='content'>comment content</label>
                        <textarea class='form-control' id='content' name='content' >
                        </textarea>
                    </div>
                    <button type="submit" class='btn btn-primary'>submit comment</button>
                </form>
            </div>
        </div>
    </div>
