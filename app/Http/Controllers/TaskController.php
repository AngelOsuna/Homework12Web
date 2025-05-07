<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index() {
        return Task::all();
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'title' => 'required|string',
            'author' => 'required|string',
            'description' => 'required|string',
            'category' => 'required|string',
        ]);

        return Task::create($validated);
    }

    public function show($id) {
        return Task::findOrFail($id);
    }

    public function update(Request $request, $id) {
        $task = Task::findOrFail($id);
        $task->update($request->all());
        return $task;
    }

    public function destroy($id) {
        $task = Task::findOrFail($id);
        $task->delete();
        return response()->json(['message' => 'Task deleted']);
    }
}
