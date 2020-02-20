<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Model\Question;
use App\Model\Qrecord;
use App\Model\Answer;

class AnswerController extends Controller{
    public function create($qid){
        $question = Question::find($qid);
        $record = Qrecord::find($question->qrecord_id);
        return view('answer.create', ['question' => $question, 'record' => $record]);
    }
    public function edit($pid, $aid){
        $answer = Answer::find($aid);
        $question = $answer->question;
        $record = Qrecord::find($question->qrecord_id);
        return view('answer.edit', ['record' => $record,'question'=> $question, 'answer' => $answer]);
    }
    public function show($pid, $aid){
        $answer = Answer::find($aid);
        $question = $answer->question;
        $record = Qrecord::find($question->qrecord_id);
        return view('answer.show', ['record' => $record,'question'=> $question, 'answer' => $answer]);
    }
    public function update(Request $request,$qid, $aid){
        $answer = Answer::find($aid);
        $answer->content = $request->content;
        $answer->save();
        return redirect('/question/'.$qid.'/answer/'.$aid);
    }
    public function store(Request $request, $qid){
        $answer = new Answer;
        $answer->content= $request->content;
        $answer->question_id = $qid;
        $answer->user_id = Auth::id();
        $answer->save();
        return redirect('/question/'.$qid.'/answer/'.$answer->id);
    }
    public function delete($qid, $aid){
        Answer::destroy($aid);
        return redirect('/question/'.$qid);
    }
}
?>
