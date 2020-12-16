@extends('layouts.layout',['title'=>"Просмотр поста $post->post_id".":$post->title"])

@section('content')




    <div class="row">
            <col-md-12>
                <div class="card">
                    <div class="card-header"><h2>{{ $post->title }}</h2></div>
                    <div class="card-body">
                        <img class="card-img-top" src="{{$post->img ?? asset('img/default.jpg')}}" alt="">
                        <div class="card-descr">Описание:{{ $post->descr }}</div>
                        <div class="card-author">Автор:{{ $post->name }}</div>
                        <div class="card-date">Пост создан:{{ $post->created_at->diffForHumans() }}</div>
                        <div class="card-btn">
                            <a href="{{route('post.index')}}" class="btn btn-outline-primary">На главную</a>
                            <a href="{{route('post.edit',['id'=>$post->post_id])}}" class="btn btn-outline-success">Редактировать</a>
                            <form action="{{route('post.destroy',['id'=>$post->post_id])}}" method="post" onsubmit="if (confirm('Подтверждаете удаление?')) {return true} else {return false}">
                                @csrf
                                @method('DELETE')
                                <input type="submit" class="btn btn-outline-danger" value="Удалить" >
                            </form>
                        </div>
                    </div>
                </div>
            </col-md-12 >
    </div>



@endsection

