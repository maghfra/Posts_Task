<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request, $postId)
    {
        $user = Auth::user();
        $request->validate([
            'content' => 'required'
        ]);

        $post = Post::find($postId);

        Comment::create([
            'content' => $request->input('content'),
            'user_id' => $user->id,
            'post_id' => $post->id,
        ]);

        return redirect()->route('posts.show', $post->id)
            ->with('success', 'Comment added successfully.');
    }

    public function destroy($id)
    {
        $comment = Comment::find($id);

        if (Auth::id() !== $comment->user_id) {
            return redirect()->route('posts.show', $comment->post_id)
                ->with('error', 'You are not authorized to delete this comment.');
        }

        $comment->delete();

        return redirect()->route('posts.show', $comment->post_id)
            ->with('success', 'Comment deleted successfully.');
    }
    
}
