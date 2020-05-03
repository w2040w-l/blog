<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Model\Question;
use App\Model\Qrecord;
use App\Model\Answer;

class AnswerController extends Controller{
    public function show($pid, $aid){
        $answer = Answer::find($aid);
        $question = $answer->question;
        if($question == null){
            abort(404);
        } else if($question->status == 0 ) {
            if(!Auth::check() || Auth::user()->isroot != 1)
                abort(404);
        }
        $record = Qrecord::find($question->qrecord_id);
        return view('answer.show', ['record' => $record,'question'=> $question, 'answer' => $answer]);
    }
    public function update(Request $request,$qid, $aid){
        $vaild = $request->validate(['content' => 'required']);
        $answer = Answer::find($aid);
        if($answer->content != $request->content){
            $answer->content = $request->content;
            $answer->save();
        }
        return ['content' => nl2br($answer->content), 'answer' => $answer];
    }
    public function store(Request $request, $qid){
        $vaild = $request->validate(['content' => 'required']);
        $answer = new Answer;
        $answer->content= $request->content;
        $answer->question_id = $qid;
        $answer->user_id = Auth::id();
        $answer->save();
        return '/question/'.$qid.'/answer/'.$answer->id;
    }
    public function delete($qid, $aid){
        Answer::destroy($aid);
        return redirect('/question/'.$qid);
    }
}
?>
