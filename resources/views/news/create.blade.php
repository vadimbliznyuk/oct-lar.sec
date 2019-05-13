@extends('layouts.app')
@section('content')
<!-- Bootstrap шаблон... -->

<div class="panel-body">
    <!-- Отображение ошибок проверки ввода -->
    @include('common.errors')

    <!-- Форма новой задачи -->
    <form action="{{ route('news_store') }}" method="POST" class="form-horizontal">
        {{ csrf_field() }}

        <div class="form-group">
            <label for="news-title">Заголовок</label>
            <input type="text" name="title" class="form-control" id="news-title">
        </div>
        <div class="form-group">
            <label for="news-text">Текст</label>
            <textarea class="form-control" name="text" id="news-text" rows="8"></textarea>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-6">
                <button type="submit" class="btn btn-success">
                    <i class="fa fa-plus"></i> Добавить
                </button>
            </div>
        </div>
    </form>
</div>
@endsection
