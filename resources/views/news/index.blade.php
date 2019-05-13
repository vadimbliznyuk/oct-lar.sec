@extends('layouts.app')
@section('content')

<div class="panel panel-default">
    <div class="panel-heading">
        Новости
    </div>
    <a href="{{route('news_create')}}" class="btn btn-success btn-lg btn-block" role="button" aria-pressed="true">Добавить новость</a>
    <div class="panel-body">
        <table class="table table-striped task-table">
            <thead>
                <tr>
                    <th>Заголовок</th>
                    <th>Редактировать</th>
                    <th>Удалить</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($news as $one_news)
                <tr>
                    <td class="table-text">
                        <div><a href="{{route('news_show', $one_news->id)}}">{{ $one_news->title }}</a></div>
                    </td>
                    <td>
                        <form action="{{route('news_edit', $one_news->id)}}" method="GET">
                            <!--{{csrf_field()}}--> 
                            <button type="submit" class="btn btn-primary"><i class="fas fa-edit"></i></button>
                        </form>
                    </td>
                    <td>
                        <form action="{{route('news_destroy', $one_news->id)}}" method="POST">
                            {{csrf_field()}}
                            {{method_field('delete')}}

                            <button type="submit" class="btn btn default bg-danger"><i class="fas fa-trash-alt"></i></button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection