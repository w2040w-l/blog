<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Model\Question;
use App\Model\Question_tag;
use App\Model\Qrecord;
use App\Model\Tag;

class QuestionTagController extends Controller{
    public function index($qid){
        $question = Question::find($qid);
        if($question->status == -1){
            return redirect()->back()->withErrors(["this question has been locked, can't edit"]);
        }
        $record = $question->nowrecord;
        $tags = Tag::all();
        return view('questionTag.index', ["record" => $record,
            "question" => $question,
        "tags" => $tags]);
    }
    public function store($qid, $tid){
        if(Question_tag::where(['question_id' => $qid, 'tag_id' => $tid])->exists()){
            return redirect()->back()->withErrors(["the question has same tag"]);
        }
        $questiontag = new Question_tag;
        $questiontag->question_id = $qid;
        $questiontag->tag_id = $tid;
        $questiontag->save();
        return redirect()->back();
    }
    public function delete($qid, $tid){
        Question_tag::destroy($tid);
        return redirect()->back();
    }
}
?>
