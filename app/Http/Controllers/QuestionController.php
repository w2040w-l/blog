<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;
use App\Model\Question;
use App\Model\Qrecord;
use App\Model\Question_tag;
use App\Model\Tag;

class QuestionController extends Controller{
    public function __construct(){
        $this->middleware('auth', ['except'=>['show']]);
    }
    public function query(Request $request){
        $keyword = $request->keyword;
        $questions = Question::whereHas('records', function (Builder $query) use($keyword){
            $query->where('title', 'like', '%'.$keyword.'%')
                ->orWhere('content', 'like', '%'.$keyword.'%');
        })->get();
        return view('question.list', ['questions' => $questions, 'keyword' => $keyword]);
    }
    public function update(Request $request, $id){
        $vaild = $request->validate(['title' => 'required']);
        $question = Question::find($id);
        $record = Qrecord::find($question->qrecord_id);
        $nrecord = new Qrecord();
        $nrecord->title = $request->title;
        $nrecord->content= $request->desc;
        $nrecord->user_id = Auth::id();
        $nrecord->previous_qrecord = $record->id;
        $nrecord->question_id = $question->id;
        if($question->status == -1){
            return response(['errors' => ['update question' => ["question has been locked, can't be edited"]]], 424);
        }
        if($record->title == $nrecord->title && $record->content == $nrecord->content){
            ;
        } else {
            $nrecord->save();
            $question->qrecord_id = $nrecord->id;
            $question->save();
        }
        $ntags = Tag::hydrate($request->tags);
        $tags = $question->tags;
        foreach($ntags->diff($tags) as $tag){
            $this->saveTag($question->id, $tag->id );
        }
        foreach($tags->diff($ntags) as $tag){
            Question_tag::where(['tag_id' => $tag->id, 'question_id' => $question->id])->delete();
        }
        return 0;
    }
    public function saveTag($qid, $tid){
        $questiontag = new Question_tag;
        $questiontag->question_id = $qid;
        $questiontag->tag_id = $tid;
        $questiontag->save();
        return 0;
    }
    public function store(Request $request){
        $vaild = $request->validate(['title' => 'required']);
        $question = new Question;
        $record = new Qrecord;
        $record->title = $request->title;
        $record->content= $request->desc;
        $record->user_id = Auth::id();
        $question->user_id = Auth::id();
        $question->status = 1;
        $record->save();
        $question->qrecord_id = $record->id;
        $question->save();
        $record->question_id = $question->id;
        $record->save();
        $tags = $request->tags;
        foreach($tags as $tag){
            $this->saveTag($question->id, $tag['id'] );
        }
        return '/question/'.$question->id;
    }
    public function show($id){
        $question = Question::find($id);
        if($question == null){
            abort(404);
        } else if($question->status == 0 ) {
            if(!Auth::check() || Auth::user()->isroot != 1)
                abort(404);
        }
        $record = Qrecord::find($question->qrecord_id);
        $answers = $question->answers;
        return view('question.show', [
            'answers' => $answers,
            'record' => $record,'question'=> $question]);
    }
    public function delete(Request $request, $qid){
        if(Auth::user()->isroot == 1){
            $question = Question::find($qid);
            if($question->status != 0)
                $question->status = 0;
            else if($question->status == 0)
                $question->status = 1;
            $question->save();
            return redirect()->back();
        }
    }
    public function lock(Request $request, $qid)
    {
        if(Auth::user()->isroot == 1){
            $question = Question::find($qid);
            if($question->status == 1)
                $question->status = -1;
            else if($question->status == -1)
                $question->status = 1;
            $question->save();
            return redirect()->back();
        }
    }
}
?>
