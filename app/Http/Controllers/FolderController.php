<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Folder;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\CreateFolder;


class FolderController extends Controller
{
  public function showCreateForm()
  {
    return view('folders/create');
  }
  //

  public function create(CreateFolder $request)
  {
    $folder = new Folder();

    //タイトルに入力値を挿入
    $folder->title = $request->title;

    //追記★ユーザーに紐づけて保存 
    Auth::user()->folders()->save($folder);

    //インスタンスの状態をDBへ書き込む（保存する、確定する）
    // $folder->save();
  
   


    return redirect()->route('tasks.index', [
      //同じカラムのidを変数idとしてViewに渡す
      'id' => $folder->id,
    ]);
  }
}