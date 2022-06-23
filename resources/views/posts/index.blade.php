@extends('layout')

@section('content')
    <div class="container mt-4">
        <div>
            <a href="{{route('posts.create')}}" class="btn btn-primary">投稿の新規作成</a>
        </div>
    </div>
    <div class="container my-4">
        @foreach ($posts as $post)
        <div class="card mb-4">
            <div class="card-header">
                <h2>{{$post->title}}</h2>
            </div>
            <div class="card-body">
                <p>{{$post->body}}</p>
                <a href="{{route('posts.show', ['post_id'=>$post->id])}}" class="card-link">詳細を見る</a>
            </div>
            <div class="card-footer">
                <span>
                    投稿日時:{{$post->created_at->format('Y-m-d')}}
                </span>
            </div>
        </div>
        @endforeach

        <div class="d-flex justify-content-center mb-5">
            {{$posts->links()}}
        </div>
    </div>

@endsection('content')