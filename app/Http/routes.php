<?php

use Illuminate\Http\Request;


Route::get('/', function () {
    return view('tasks.index'); // уроки это вид tasks
});

Route::post('/tasks', function (Request $request){
    
    
});