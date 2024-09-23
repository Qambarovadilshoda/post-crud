@extends('layouts.app')

@section('content')

<div class="container mt-5">
    <h1 class="text-center">Post CRUD</h1>
    <div class="row">
        <div class="col-md-12">
            <a href="{{route('posts.create')}}" class="btn btn-primary mb-3">Add New Post</a>

            <table class="table table-bordered table-hover">

                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Body</th>
                        <th>Image</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                @foreach ($posts as $post)
                <tbody>
                    <tr>

                        <td>{{$post->id}}</td>
                        <td>{{$post->name}}</td>
                        <td>{{$post->body}}</td>
                        <td><img src="{{asset('storage/'. $post->image)}}" width="100" alt="Rasm yo'q"></td>
                        <td>
                            <a href="{{route('posts.show',  $post->id)}}" class="btn btn-info btn-sm">Show</a><br>
                            <a href="{{route('posts.edit', $post->id)}}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{route('posts.destroy', $post->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                    <!-- Add more products here -->
                </tbody>
                @endforeach
            </table>
        </div>
    </div>
</div>
@endsection