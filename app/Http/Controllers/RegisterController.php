<?php
namespace App\Http\Controllers;
use App\Model\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller{
    /*
    public function index(){
        return view("auth.register");
    }*/
    public function register(Request $request){
        try{
            $request->validate(['username' => 'unique:users|required|max:10',
                'password' => 'required|min:6']);
            $user = User::where('username', $request->username)->first();
            $user = new User;
            $user->username = $request->username;
            $user->password = Hash::make($request->password);
            $user->status = 1;
            $user->save();
            return redirect("/");
        } catch(Exception $e){
            return vender($e);
        }
    }
}
?>
