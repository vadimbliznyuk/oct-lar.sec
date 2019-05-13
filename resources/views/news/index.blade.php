@extends('layouts.app')
@section('content')

@if (count($news) > 0)
<div class="panel panel-default">
    <div class="panel-heading">
        Новости
    </div>
    <div class="panel-body">
        <table class="table table-striped task-table">
            <thead>
                <tr>
                    <th>Заголовоки</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($news as $one_news)
                <tr>
                    <td class="table-text">
                        <div><a href="{{route('news_show', $one_news->id)}}">{{ $one_news->title }}</a></div>
                    </td>
                </tr>
            
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endif
@endsection