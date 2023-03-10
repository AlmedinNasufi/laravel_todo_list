<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $todo_list = Task::where('completed', false)->get();

        return response()->json([
            'status' => 200,
            'message' => 'Data retrived successfully',
            'data' => $todo_list
        ]);
    }

    public function getCompletedTasks()
    {
        $todo_list = Task::where('completed', true)->get();

        return response()->json([
            'status' => 200,
            'message' => 'Data retrived successfully',
            'data' => $todo_list
        ]);
    }

    public function getTasks()
    {
        $todo_list = Task::all();

        return response()->json([
            'status' => 200,
            'message' => 'Data retrived successfully',
            'data' => $todo_list
        ]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request->all();

        Task::create([
            'Author' => $request->input('author'),
            'task' => $request->input('task')
        ]);

        return response()->json(['Task created successfully']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $task = Task::find($id);

        $task->update([
            'Author' => $request->input('author'),
            'task' => $request->input('task'),
        ]);

        return response()->json([
            'status' => 200,
            'task' => $task,
            'message' => 'Task in todo list updated successfully',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $task = Task::find($id);
        $task->delete();
        return response()->json(['Task in todo list is deleted successfully']);
    }
}
