<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Model\Answer;
use App\Model\Commentmy;

class CommentController extends Controller{
    public function store(Request $request, $qid, $aid){
        $vaild = $request->validate(['content' => 'required']);
        $comment = new Commentmy;
        $comment->content= $request->content;
        $comment->answer_id = $aid;
        $comment->user_id = Auth::id();
        $comment->save();
        return $comment->load('user')->toJson();
    }
    public function delete($qid, $aid, $cid){
        Commentmy::destroy($cid);
        return 1;
    }
    public function getall($qid, $aid){
        return Answer::find($aid)->comments->load('user')->toJson();
    }
}
?>
