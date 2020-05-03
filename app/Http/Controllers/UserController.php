<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Model\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        //todo
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function lock(Request $request, $uid)
    {
        if(User::where(["id" => Auth::id(), "isroot" => 1])->exists()){
            $user = User::find($uid);
            $user->status = -1;
            $user->save();
            return redirect()->back();
        }
    }
    public function update(Request $request, $uid){
        $user = User::find($uid);
        $user->intro = $request->intro;
        $user->save();
        return $user;
    }
    public function showQuestions($uid){
        $user = User::find($uid);
        $questions = $user->questions()->paginate(20);
        return view("user.question", ["user"=> $user,
            "questions" => $questions,
        "type" => 'questions']);
    }
    public function showAnswers($uid){
        $user = User::find($uid);
        $answers = $user->answers()->paginate(20);
        return view("user.answer", ["user"=> $user,
            "answers" => $answers,
        "type" => 'answers']);
    }

}
