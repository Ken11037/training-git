<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task; /* 名前空間を設定します */

class TaskController extends Controller
{
  public function index(){                      /* indexメソッドを追加します */
    $task = Task::orderBy('id', 'asc')->get();  /* Taskクラスを使ってtasksテーブル全件取得を指示 */

    /* task.blade.phpに対し(第1引数)、taskカラムのデータをtasksに渡す(第2引数) */
    return view('task', [
      'tasks' => $task
    ]);
  }

  public function register(Request $request){
    $task = new Task;
    $task->task = $request->task;
    $task->save();
    return redirect('/');
  }

  public function delete(Request $request){
    $task = Task::find($request->id);  /*Taskクラスを使って、ajaxで渡ってきたidをセットする*/
    $task->delete();                   /*指定されたidを削除する*/
    /* $task = Task::find($request->id)->delete(); //これでも可 */
    return redirect('/');
  }
}