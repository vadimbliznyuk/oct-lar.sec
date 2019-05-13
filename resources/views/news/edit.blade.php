@extends('layouts.app')
@section('content')
<!-- Bootstrap шаблон... -->

<div class="panel-body">
    <!-- Отображение ошибок проверки ввода -->
    @include('common.errors')

    <!-- Форма новой задачи -->
    <form action="{{route('news_update',$news->id)}}" method="POST" class="form-horizontal">
        {{ csrf_field() }}
        {{method_field('PATCH')}}
        <div class="form-group">
            <label for="news-title">Заголовок</label>
            <input type="text" name="title" class="form-control" id="news-title" value="{{$news->title}}">
        </div>
        <div class="form-group">
            <label for="news-text">Текст</label>
            <textarea class="form-control" name="text" id="news-text" rows="8">{{$news->text}}</textarea>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-6">
                <button type="submit" class="btn btn-primary">
                    <i class="fa fa-edit btn-primary"></i> Изменить
                </button>
            </div>
        </div>
    </form>
</div>
@endsection