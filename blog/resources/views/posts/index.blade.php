@extends('layouts.app')

@section('title', "All Posts")
@section('content')

<div class="container my-5">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Title</th>
                <th>Content</th>
                <th>Posted By</th>
                <th>Show</th>
                @auth
                    <th>Update</th>
                    <th>Delete</th>
                @endauth
            </tr>
        </thead>
        <tbody>
        @foreach ($posts as $post)
            <tr>
                <td>{{ $post->id }}</td>
                <td>{{ $post->title }}</td>
                <td>{{ $post->content }}</td>
                <td>{{ $post->user->name }}</td>
                <td>
                    <a href="{{ route('posts.show', $post->id) }}" class="btn btn-secondary">Show</a>
                </td>
                @auth
                    @if(Auth::id() === $post->user_id)
                        <td>
                            <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-warning text-light">Edit</a>
                        </td>
                        <td>
                            <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    @else
                        <td colspan="2" class="text-center text-muted">Not Authorized</td>
                    @endif
                @endauth
            </tr>   
        @endforeach
        </tbody>
    </table>
</div>
@endsection
