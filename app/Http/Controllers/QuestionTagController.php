<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Model\Question;
use App\Model\Question_tag;
use App\Model\Qrecord;
use App\Model\Tag;

class QuestionTagController extends Controller{
    public function query($qid){
        $question = Question::find($qid);
        return $question->question_tags()->orderBy('id', 'asc')->pluck('tag_id');
    }
}
?>
