<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Model\User;

class LoginController extends Controller{
    public function changepassword(Request $request){
        $request->validate(['password' => 'required',
        'newpassword' => 'required']);
        $user = ['id' => Auth::id(), 'password' => $request->password];
        if(Auth::attempt($user, true)){
            $user = User::find(Auth::id());
            $user->password = Hash::make($request->newpassword);
            $user->save();
            $this->logout();
            return 1;
        } else {
            return response(['errors' => ['login' => ["user don't match password"]]], 424);
        }
    }
    public function login(Request $request){
        $request->validate(['username' => 'required',
        'password' => 'required']);
        $user = $request->only('username', 'password');
        if(Auth::attempt($user, true)){
            return redirect()->intended('/');
        } else {
            return response(['errors' => ['login' => ["user don't match password"]]], 424);
        }
    }
    public function logout(){
        Auth::logout();
        return redirect()->intended('/');
    }
}
?>
