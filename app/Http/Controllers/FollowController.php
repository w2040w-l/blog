<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Model\User;
use App\Model\Follow;

class FollowController extends Controller{
    public function showFollowers($uid){
        $user = User::find($uid);
        $follows = Follow::where(['followed_id' => $uid])->get();
        return view("user.follower", ['follows' => $follows, 'user' => $user, 'type' => 'other']);
    }
    public function showFollowings($uid){
        $user = User::find($uid);
        $follows = Follow::where(['follower_id' => $uid])->get();
        return view("user.followed", ['follows' => $follows, 'user' => $user, 'type' => 'other']);
    }
    public function store(Request $request, $uid){
        $follow = new Follow;
        $follow->follower_id = Auth::id();
        if(User::find($uid) == NULL){
            return redirect()->back()->withErrors(["the user don't exist"]);
        }
        $follow->followed_id = $uid;
        $follow->save();
        return redirect()->back();
    }
    public function delete($uid){
        Follow::where(['followed_id'=> $uid, 'follower_id' => Auth::id()])->delete();
        return 1;
    }
}
?>
