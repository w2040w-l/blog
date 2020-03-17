<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Model\Question;
use App\Model\Answer;
use App\Model\Watch;
use App\Model\User;

class WatchController extends Controller{
    public function show($uid){
        $user = User::find($uid);
        $watches = $user->watches()->paginate('15');
        return view("user.watch", ['user' => $user, 'watches' => $watches, 'type' => 'other']);
    }
    public function store(Request $request, $qid){
        $watch = new Watch;
        if(Question::find($qid) == NULL){
            return redirect()->back()->withErrors("invalid question id");
        }
        $watch->question_id = $qid;
        $watch->user_id = Auth::id();
        $watch->save();
        return redirect()->back();
    }
    public function delete($qid){
        $watch = Watch::where(['question_id'=> $qid, 'user_id' => Auth::id()])->delete();
        return 1;
    }
}
?>
