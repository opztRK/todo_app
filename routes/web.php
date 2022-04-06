<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });


//初期→Route::get('/','TaskController@top');

//会員登録TOP
Auth::routes(); //会員登録・ログイン・ログアウト・パス再設定の各機能で必要なルーティングすべてを定義

Route::get('/','HomeController@index')->name('home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//認証メソッド

//インデックス
Route::get('/folders/{id}/tasks', 'TaskController@index')->name('tasks.index');
//フォルダ作成
Route::get('/folders/create','FolderController@showCreateForm')->name('folders.create');
Route::post('/folders/create','FolderController@create');
//タスク作成
Route::get('/folders/{id}/tasks/create','TaskController@showCreateForm')->name('tasks.create');
Route::post('/folders/{id}/tasks/create','TaskController@create');
//編集機能
Route::get('/folders/{id}/tasks/{task_id}/edit','TaskController@showEditForm')->name('tasks.edit');
Route::post('/folders/{id}/tasks/{task_id}/edit','TaskController@edit');


