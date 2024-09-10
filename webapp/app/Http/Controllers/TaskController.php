<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $tasks = Task::all();
        $users = User::all();

        $sortField = $request->input('sort', 'id');
        $sortOrder = $request->input('order', 'asc');

        $tasks = Task::orderBy($sortField, $sortOrder)->get();


        //index.blade.phpを参照する。
        return view('index',compact('tasks', 'sortField', 'sortOrder'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //usersテーブルから全ユーザーを取得
        $users = User::all();

        //create.blade.phpを参照する。
        return view('create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //タスク登録処理
        $request->validate([
            'title' => 'required|string|max:255',
            'user_id' => 'required|exists:users,id',
            'status' => 'required|in:0,1,2,3',
            'comment' => 'nullable|string',
        ]);

        //タスクを保存
        Task::create([
            'title' => $request->title,
            'user_id' => $request->user_id,
            'status' => $request->status,
            'comment' => $request->comment,
        ]);
        return redirect()->route('task.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        $tasks = Task::all();
        $users = User::all();
        return view('edit', compact('task', 'users'));
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task)
    {
        $task->update([
            'title' => $request->title,
            'user_id' => $request->user_id,
            'status' => $request->status,
            'comment' => $request->comment,
        ]);
        return redirect()->route('task.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->route('task.index');
    }
}
