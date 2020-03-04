<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Model\Question;
use App\Model\Answer;
use App\Model\Approve;

class ApproveController extends Controller{
    public function show($pid){
//todo
    }
    public function store(Request $request, $aid){
        $approve = new Approve;
        $approve->answer_id = $aid;
        $approve->user_id = Auth::id();
        $approve->save();
        $qid = Answer::find($aid)->question->id;
        return redirect('/question/'.$qid);
    }
    public function delete($aid){
        $qid = Answer::find($aid)->question->id;
        $app = Approve::where(['answer_id'=> $aid, 'user_id' => Auth::id()])->delete();
        return 1;
        return redirect('/question/'.$qid);
    }
}
?>
