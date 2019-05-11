<?php

use Illuminate\Http\Request;
use App\Task;

Route::get('/', function () {
    $tasks = Task::all();

    return view('tasks.index', [
        'tasks' => $tasks,
    ]); 
    
})->name('tasks_index');

Route::post('/tasks', function (Request $request) {

    $validator = Validator::make($request->all(), [
                'name' => 'required|max:255',
    ]);

    if ($validator->fails()) {
        return redirect(route('tasks_index'))
                        ->withInput()
                        ->withErrors($validator);
    }

    $task = new Task();
    $task->name = $request->name;

    $task->save();
    return redirect(route('tasks_index'));
    
})->name('tasks_store');

Route::delete('/tasks/{task}', function (Task $task) {
    
    $task->delete();
    return redirect(route('tasks_index'));
    
})->name('tasks_destroy');

Route::get('/tasks/{task}/edit', function (Task $task) {
    
    return view('tasks.edit', [
        'task' => $task,
    ]); 
    
})->name('tasks_edit');

Route::patch('/tasks/{task}', function (Request $request, Task $task ) {

    $validator = Validator::make($request->all(), [
                'name' => 'required|max:255',
    ]);

    if ($validator->fails()) {
        return redirect(route('tasks_edit', $task->id))
                ->withInput()
                ->withErrors($validator);
    }

    $task->name = $request->name;
    $task->save();
    return redirect(route('tasks_index'));
    
})->name('tasks_update');
