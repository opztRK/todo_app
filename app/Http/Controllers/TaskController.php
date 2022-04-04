<?php

namespace App\Http\Controllers;

use App\Models\Folder;
use App\Models\Task;
use Illuminate\Http\Request;
use App\Http\Requests\CreateTask;


class TaskController extends Controller
{
    //

    public function top()
    {
        return view('tasks/index');
    }

    public function index(int $id)
    {
        // すべてのフォルダを取得する
        $folders = Folder::all();

        // 選ばれたフォルダを取得する  
        $current_folder = Folder::find($id);

        // 選ばれたフォルダに紐づくタスクを取得する
        $tasks = Task::where('folder_id',$current_folder->id)->get();

        return view('tasks/index',[
            'folders' => $folders,
            'current_folder_id' => $current_folder->id,
            'tasks' => $tasks,
        ]);
    }

    public function showCreateForm($id)
    {
        return view('tasks/create',[
            'id'=> $id,
        ]);

    }

    public function create($id,CreateTask $request)
    {
        // 今のフォルダーを取得
        $current_folder = Folder::find($id);
        
        // 新規タスクのインスタンス
        $task = new Task();
        //保存内容
        $task->title = $request->title;
        $task->due_date = $request->due_date;

        //currentフォルダーのTaskに保存する
        $current_folder->tasks()->save($task);

        return redirect()->route('tasks.index',[
            'id' => $current_folder->id,
        ]);
    }


    public function showEditForm($id,$task_id)
    {
        //idから行取得
        $task = Task::find($task_id);

        return view('tasks/edit',[
            'task' => $task,
            'id' => $task_id,
        ]);

    }








}