<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Model\Tag;
use App\Model\Trecord;

class TagController extends Controller{
    public function __construct(){
        $this->middleware('auth', ['except'=>['show', 'index']]);
    }
    public function index(){
        $tags = Tag::all();
        return view('tag.index', ["tags"=> $tags]);
    }
    public function create(){
        return view('tag.create');
    }
    public function edit($id){
        $tag = Tag::find($id);
        $record = Trecord::find($tag->trecord_id);
        return view('tag.edit', ['record' => $record,'tag'=> $tag]);
    }
    public function update(Request $request, $id){
        $tag = Tag::find($id);
        $record = Trecord::find($tag->trecord_id);
        $nrecord = new Trecord();
        $nrecord->content= $request->content;
        $nrecord->user_id = Auth::id();
        $nrecord->previous_trecord = $record->id;
        $nrecord->tag_id = $tag->id;
        $nrecord->save();
        $tag->trecord_id = $nrecord->id;
        $tag->save();
        return redirect('/tag/'.$tag->id);
    }
    public function store(Request $request){
        $tag = new Tag;
        $record = new Trecord;
        $tag->title = $request->title;
        $record->content= $request->content;
        $record->user_id = Auth::id();
        $tag->status = 1;
        $record->save();
        $tag->trecord_id = $record->id;
        $tag->save();
        $record->tag_id = $tag->id;
        $record->save();
        return redirect('/tag/'.$tag->id);
    }
    public function show($id){
        $tag = Tag::find($id);
        $record = Trecord::find($tag->trecord_id);
        $answers = $tag->answers()->orderby('created_at', 'desc')->get();
        return view('tag.show', [
            'answers' => $answers,
            'record' => $record,'tag'=> $tag]);
    }
    public function delete($id){

    }
}
?>
