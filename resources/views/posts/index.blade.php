@extends('layouts.layout')
@section('content')

    @if(isset($_GET['search']))

        @if(count($posts)>0)
            <center>
            <h2>Результаты поиска по запросу <?php $_GET['search'] ?></h2>
            <p class="lead">Всего найдено {{count($posts)}} постов</p>
            </center>
        @else
            <center>
            <h2>По запросу <?php $_GET['search'] ?>&nbsp ничего не найдено</h2>
                <a href="{{ route('post.index') }}" class="btn btn-outline-primary">Отобразить все посты</a>
            </center>
        @endif

    @endif


    <div class="row">
        @foreach($posts as $post)
            <col-md-6>
                <div class="card">
                    <div class="card-header"><h2>{{$post->short_title}}</h2></div>
                    <div class="card-body">
                        <div class="card-img" style="background-image:url({{$post->img ?? asset('img/default.jpg')}})"></div>
                        <div class="card-author">Автор:{{$post->name}}</div>
                        <a href="" class="btn btn-outline-primary">Посмотреть пост</a>
                    </div>
                </div>
            </col-md-6 >
        @endforeach
    </div>

    @if(!isset($_GET['search']))
      {{ $posts->links() }}
    @endif

@endsection

