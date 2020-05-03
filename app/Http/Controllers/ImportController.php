<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;
use App\Model\Question;
use App\Model\Answer;
use App\Model\Commentmy;
use App\Model\Qrecord;
use App\Model\Question_tag;
use App\Model\Tag;

class ImportController extends Controller{
    public function __construct(){
        $this->middleware('auth', ['except'=>['show']]);
    }
    public function index(){
        if(Auth::user()->isroot != 1){
            abort(404);
        }
        return 0;
        $answers = json_decode(file_get_contents(storage_path().'/quotes.json'), true);
        $flag = 0;
        $questions = $answers[0];
        $qids = new \ArrayObject(array());
        $useuid = array_pad(array(), 12, 1);
        foreach($questions['titles'] as $question){
            $qids->append($this->createQuestion($question));
        }
        foreach($answers as $janswer)
            if($flag != 0){
                $answer = new Answer;
                $content = str_split($janswer['content'], 150);
                $answer->content= $janswer['content'];
                $answer->question_id = $qids[$janswer['qid']];
                $answer->user_id = $useuid[$janswer['qid']];
                $useuid[$janswer['qid']]++;
                $answer->save();
                $this->createComments($answer->id, $janswer['comments']);
            } else {
                $flag = 1;
            }
        return view('import' , ['quotes' => ['a' =>print_r($answers[2])] ]);
    }
    public function createComments($aid, $comments){
        foreach($comments as $jcomment){
            $comment = new Commentmy;
            $comment->content= $jcomment;
            $comment->answer_id = $aid;
            $comment->user_id = rand(1,8);
            $comment->save();
        }
        return 0;
    }
    public function createQuestion($title){
        $question = new Question();
        $question->user_id = 2;
        $question->status = 1;
        $record = new Qrecord();
        $record->title = $title;
        $record->user_id = 2;
        $record->save();
        $question->qrecord_id = $record->id;
        $question->save();
        $record->question_id = $question->id;
        $record->save();
        return $question->id;
    }
}
?>
