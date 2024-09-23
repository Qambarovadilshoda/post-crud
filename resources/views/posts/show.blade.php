@extends('layouts.app')

@include('layouts.show_style')

@section('content')

<div class="container mt-5">
    <h1 class="text-center post-header mb-4">{{$post->name}}</h1>
    <h1 class="text-center">{{$post->body}}</h1>
    <img src="{{asset('storage/' . $post->image)}}" width="200" alt="Rasm yo'q">
    <div class="post-details text-center">
        <h1 class="created-updated">{{$post->created_at}}</h1>
        <h1 class="created-updated">{{$post->updated_at}}</h1>
    </div>
    <!-- Back to Index Button -->
    <div class="text-center back-btn">
        <a href="{{route('posts.index')}}" class="btn btn-primary">Back</a>
    </div>
</div>

@endsection