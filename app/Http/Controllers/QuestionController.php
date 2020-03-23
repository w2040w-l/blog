<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Model\Question;
use App\Model\Qrecord;
use App\Model\Question_tag;

class QuestionController extends Controller{
    public function __construct(){
        $this->middleware('auth', ['except'=>['show']]);
    }
    public function edit($id){
        $question = Question::find($id);
        if($question->status == -1){
            return redirect()->back()->withErrors(["this question has been locked, can't edit"]);
        }
        $record = Qrecord::find($question->qrecord_id);
        return view('question.edit', ['record' => $record,'question'=> $question]);
    }
    public function update(Request $request, $id){
        $question = Question::find($id);
        $record = Qrecord::find($question->qrecord_id);
        $nrecord = new Qrecord();
        $nrecord->title = $request->title;
        $nrecord->content= $request->desc;
        $nrecord->user_id = Auth::id();
        $nrecord->previous_qrecord = $record->id;
        $nrecord->question_id = $question->id;
        $nrecord->save();
        $question->qrecord_id = $nrecord->id;
        $question->save();
        return redirect('/question/'.$question->id);
    }
    public function saveTag($qid, $tid){
        $questiontag = new Question_tag;
        $questiontag->question_id = $qid;
        $questiontag->tag_id = $tid;
        $questiontag->save();
        return 0;
    }
    public function store(Request $request){
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
        $record = Qrecord::find($question->qrecord_id);
        $answers = $question->answers;
        return view('question.show', [
            'answers' => $answers,
            'record' => $record,'question'=> $question]);
    }
    public function delete($id){

    }
    public function lock(Request $request, $qid)
    {
        if(Auth::user()->isroot == 1){
            $question = Question::find($qid);
            $question->status = -1;
            $question->save();
            return redirect()->back();
        }
    }
}
?>
