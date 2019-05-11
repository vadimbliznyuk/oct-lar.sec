@extends('layouts.app')
@section('content')

@if (count($news) > 0)
<div class="panel panel-default">
    <div class="panel-heading">
        Новости
    </div>

    <div class="panel-body">
        <table class="table table-striped task-table">

            <!-- Заголовок таблицы -->
            <thead>
                <tr>
                    <th>Заголовок</th>
                    <th>Текст</th>
                </tr>
            </thead>

            <!-- Тело таблицы -->
            <tbody>
                @foreach ($news as $one_news)
                <tr>
                    <!-- Имя задачи -->
                    <td class="table-text">
                        <div>{{ $news->title }}</div>
                    </td>
                    <td class="table-text">
                        <div>{{ $news->text }}</div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endif

@endsection