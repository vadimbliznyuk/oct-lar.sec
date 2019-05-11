<?php

use Illuminate\Http\Request;
use App\Task;
use App\News;

Route::get('/', function (){
    return view('index');
})->name('home');

Route::group(['prefix' => 'news'], function () {
   Route::get('/', function () {
       
//       var_dump('sdafsd');
//       die();
       
	$news = News::all();
//	var_dump($news);
//	die();
	return view('news.index', [
	    'news' => $news,
	]);
    })->name('news_index');
});


Route::group(['prefix' => 'tasks'], function () {
    Route::get('/', function () {
	$tasks = Task::all();

	return view('tasks.index', [
	    'tasks' => $tasks,
	]);
    })->name('tasks_index');

    Route::post('/', function (Request $request) {

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

    Route::delete('/{task}', function (Task $task) {

	$task->delete();
	return redirect(route('tasks_index'));
    })->name('tasks_destroy');

    Route::get('/{task}/edit', function (Task $task) {

	return view('tasks.edit', [
	    'task' => $task,
	]);
    })->name('tasks_edit');

    Route::patch('/{task}', function (Request $request, Task $task ) {

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
});



