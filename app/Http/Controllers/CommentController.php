<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Model\Answer;
use App\Model\Commentmy;

class CommentController extends Controller{
    public function store(Request $request, $qid, $aid){
        $comment = new Commentmy;
        $comment->content= $request->content;
        $comment->answer_id = $aid;
        $comment->user_id = Auth::id();
        $comment->save();
        return redirect()->back();
    }
    public function delete($qid, $aid, $cid){
        Commentmy::destroy($cid);
        return redirect()->back();
    }
}
?>
