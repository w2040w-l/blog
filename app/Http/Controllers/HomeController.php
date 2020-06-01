<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Model\User;
use App\Model\Answer;
class HomeController extends Controller{
    public function index(){
        $answers = Answer::orderby('created_at', 'desc')->paginate(15);
        return view('home', ['answers' => $answers, 'sort' => 'now']);
    }
    public function tindex(){
        $answers = Answer::withCount('approves')->orderby('approves_count', 'desc')->paginate(15);
        return view('home', ['answers' => $answers, 'sort' => 'top']);
    }
    public function windex(){
        $user = User::find(Auth::id());
        $answers = $user->watchAnswers()->orderby('created_at', 'desc')->paginate(15);
        return view('home', ['answers' => $answers, 'sort' => 'watch']);
    }
}
?>
