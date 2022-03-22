<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Folder;

class TaskController extends Controller
{
    //

    public function top()
    {
        return view('tasks/index');
    }

    public function index(int $id)
    {
        $folders = Folder::all();

        return view('tasks/index',[
            'folders' => $folders,
            'current_folder_id' => $id,
        ]);
    }








}
