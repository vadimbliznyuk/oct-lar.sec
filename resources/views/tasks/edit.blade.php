@extends('layouts.app')
@section('content')
<!-- Bootstrap шаблон... -->

<div class="panel-body">
    <!-- Отображение ошибок проверки ввода -->
    @include('common.errors')

    <!-- Форма новой задачи -->
    <form action="{{url('tasks/'.$task->id)}}" method="POST" class="form-horizontal">
	{{ csrf_field() }}
        {{method_field('PATCH')}}
        
	<!-- Имя задачи -->
	<div class="form-group">
	    <label for="task" class="col-sm-3 control-label">Задача</label>

	    <div class="col-sm-6">
                <input type="text" name="name" id="task-name" class="form-control" value="<?=$task->name?>">
	    </div>
	</div>

	<!-- Кнопка изменения задачи -->
	<div class="form-group">
	    <div class="col-sm-offset-3 col-sm-6">
		<button type="submit" class="btn btn-primary">
		    <i class="fa fa-plus btn-primary"></i> Изменить задачу
		</button>
	    </div>
	</div>
    </form>
</div>
