<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class TaskController extends Controller
{
    function getAll(Request $request){
        $filter= $request->query('filter');
        $sort= $request->query('sort');

        $valid_filters = ['Todo','Pending', 'Complete'];
        $valid_sort = ['asc','desc'];

        //Filtering and sorting
        if(isset($filter) && in_array($filter, $valid_filters)){
            if(isset($sort) && in_array($sort, $valid_sort)){
                $tasks = Task::where(['user_id'=> Auth::id(), 'status'=> $filter])->orderBy('created_at',$sort)->paginate(6);
                $tab = $filter;
                $sort = $sort;
            }else {
                $tasks = Task::where(['user_id'=> Auth::id(), 'status'=> $filter])->orderBy('created_at','desc')->paginate(6);
                $tab = $filter;
                $sort = "desc";
            }
        }else {
            if(isset($sort) && in_array($sort, $valid_sort)){
                $tasks = Task::where(['user_id'=> Auth::id()])->orderBy('created_at',$sort)->paginate(6);
                $tab = 'All';
                $sort = $sort;
            }else {
                $tasks = Task::where(['user_id'=> Auth::id()])->orderBy('created_at', 'desc')->paginate(6);
                $tab = 'All';
                $sort = "desc";
            }
        }

        $tasks->appends($request->except('page'));
        return view('home')->with(['tasks'=>$tasks, 'tab'=>$tab,'sort'=>$sort]);
    }

    function search(Request $request)
    {
        $searchTerm = $request->input('search');
    
        $tasks = Task::where('user_id', Auth::id())
                        ->where(function($query) use ($searchTerm) {
                            $query->where('task', 'like', "%$searchTerm%")
                                ->orWhere('content', 'like', "%$searchTerm%");
                            })->paginate(6);

        if(count($tasks)>0){
            return view('home')->with(['tasks'=>$tasks, 'tab'=>'All','sort'=>'desc', 'search'=>$searchTerm]);
        }else{
            $tasks->appends($request->except('page'));
            $tasks = Task::where(['user_id'=> Auth::id()])->orderBy('created_at', 'desc')->paginate(6);
            return view('home')->with(['tasks'=>$tasks, 'tab'=>'All','sort'=>'desc','search_error'=>'No matches were found for your search!']);
        }
    
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
