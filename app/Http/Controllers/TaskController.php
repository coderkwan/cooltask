<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class TaskController extends Controller
{
    function getAll(){
        $tasks = Task::where('user_id', Auth::id())->get();
        return view('home')->with('data', $tasks);
    }

    function create(Request $req){
        $task = new Task();
        $task->task = $req->input('title');
        $task->content = $req->input('content');
        $task->status = 'Todo';
        $task->user_id = Auth::id();
        $task->save();

        return Redirect::back();
    }

    public function update(Request $req){
         $task = Task::find($req->input('id'));

        if($task->user_id == Auth::id()){
            $task->task = $req->input('title');
            $task->content = $req->input('content');
            $task->status = $req->input('status');
            $task->save();
        }
        return redirect('/');
    }

    public function delete(Request $request, $id){
        $task = Task::find($id);

        if($task->user_id == Auth::id()){
            $task->delete();
        }
       
        return redirect('/');
    }
}
