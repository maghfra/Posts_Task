@extends('layouts.app')

@section('title', "Post Details")

@section('content')
    <div class="container my-5">
        <!-- Post Details -->
        <div class="card" style="width: 22rem; margin:0 auto;">
            <div class="card-header text-center">
                Post Details
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><strong>User: </strong>{{ $post->user->name }}</li>
                <li class="list-group-item"><strong>Title: </strong>{{ $post->title }}</li>
                <li class="list-group-item"><strong>Content: </strong>{{ $post->content }}</li>
            </ul>
            <div class="card-footer">
                <a href="{{ route('posts.index') }}" class="btn btn-secondary w-100">Back to posts</a>
            </div>
        </div>

        <!-- Comments Section -->
        <div class="card my-4" style="width: 22rem; margin:0 auto;">
            <div class="card-header text-center">
                Comments
            </div>
            <ul class="list-group list-group-flush">
                @forelse($post->comments as $comment)
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <span><strong>{{ $comment->user->name }}:</strong> {{ $comment->content }}</span>
                        @if(Auth::id() == $comment->user_id)
                            <form action="{{ route('comments.destroy', $comment->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        @endif
                    </li>
                @empty
                    <li class="list-group-item">No comments yet.</li>
                @endforelse
            </ul>
        </div>

        <!-- Add Comment Form -->
        @auth
            <div class="card" style="width: 22rem; margin:0 auto;">
                <div class="card-header text-center">
                    Add a Comment
                </div>
                <div class="card-body">
                    <form action="{{ route('comments.store', $post->id) }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <textarea name="content" class="form-control" rows="3" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-success my-2 w-100">Submit</button>
                    </form>
                </div>
            </div>
        @endauth
    </div>
@endsection
