<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Category;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::with('category')->get();

        return view('tasks.index', [
            'tasks' => $tasks
        ]);
    }

    public function show(int $id)
    {
        $tasks = Task::find($id);

        return view('tasks.show', [
            'tasks' => $tasks
        ]);
    }

    public function create()
    {

        $categories = Category::all();


        return view('tasks.create', [
            'categories' => $categories
        ]);
    }

    public function store(Request $request)
    {

        $dados = $request->except('_token');

        Task::create($dados);

        return redirect('/tasks');
    }

    public function edit(int $id)
    {
        $task = Task::find($id);

        $categories = Category::all();

        return view('tasks.edit', [
            'task' => $task,
            'categories' => $categories
        ]);
    }

    public function update(int $id, Request $request)
    {
        $task = Task::find($id);

        $task->update([
            'name' => $request->name,
            'description' => $request->description,
            'done' => $request->done,
            'categories_id' => $request->categories_id,
        ]);

        return redirect('/tasks');
    }

    public function destroy(int $id)
    {
        $tasks = Task::find($id);
        $tasks->delete();
        return redirect('/tasks');
    }

    public function markDone(Task $task) 
    {
        $task->update(['done' => 1]);
        return redirect()->back()->with('success', 'feito');
    }


    public function markUndone(Task $task) 
    {
        $task->update(['done' => 2]);
        return redirect()->back()->with('success', 'n feito');
    }
}
