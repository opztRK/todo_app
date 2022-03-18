<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todolists;

class TodolistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   //Todolistsの全てを$listに代入
        $list = Todolists::all();
        return view('todolists.index', compact('list'));
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('todolists.create');
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   //Todolistsテーブルを呼び出し
        $todo = new Todolists();
        //titleに送信値を入れる
        $todo->title = $request->input('title');
        //できた$todoカラムを登録
        $todo->save();

        return redirect('todolist')->with(
            'status',
            'No '.$todo->id.'の'.$todo->title.'を登録しました。'
        );
            
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $todo = Todolists::find($id);

        return view('todolists.info',compact('todo'));

        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $todo = Todolists::find($id);
        return view('todolists.edit',compact('todo'));
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $todo = Todolists::find($id);
        $todo->title  =$request->input('title');
        //saveで登録
        $todo->save();

        return redirect('todolist')->with(
            'status',
            'No'.$todo->id.'を'.$todo->title. 'に更新しました。'
        );
        
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $todo = Todolists::find($id);
        $todo->delete();

        return redirect('todolist')->with(
            'status',
            'No'.$todo->id.'の'.$todo->title.'を削除しました。'
        );
        //
    }
}
