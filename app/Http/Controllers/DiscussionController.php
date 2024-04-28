<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Auth;

class DiscussionController extends Controller
{
    public function index()
    {
        // Fetch all posts
        $posts = Post::with('user')
            ->withCount('comments')  // This will add a 'comments_count' attribute to each post
            ->orderByDesc('created_at')
            ->get(); // Include the user data for each post

            $books = Book::orderBy('title')->get();

        return view('pages/discussion', compact('posts', 'books'));
    }

    public function storePost(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string'
        ]);

        $post = new Post();
        $post->user_id = auth()->id(); // Ensure the user is logged in
        $post->title = $request->title;
        $post->content = $request->content;
        $post->book_id = $request->book;
        $post->save();

        return redirect()->route('posts.index')->with('success', 'Post created successfully!');
    }

    public function show($id)
    {
        $post = Post::with([
            'user',
            'comments' => function($query) {
                $query->whereNull('parent_id')  // Ensure only top-level comments are loaded
                      ->with(['user', 'replies' => function($query) {
                          $query->with('user')->orderBy('created_at', 'asc');
                      }])
                      ->orderBy('created_at', 'asc');
            }
        ])->findOrFail($id);
    
        return view('pages.post', compact('post'));

        return view('pages/post', compact('post'));
    }

    public function storeComment(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'post_id' => 'required|exists:posts,id', // Ensure the post exists
            'content' => 'required|string',          // Ensure content is provided and is a string
            'parent_id' => 'nullable|exists:comments,id'  // Optional, but must exist if provided
        ]);

        // Create and save the new comment
        $comment = new Comment();
        $comment->posts_id = $request->post_id;
        $comment->content = $request->content;
        $comment->user_id = auth()->id(); // Authenticated user's ID

        // Set parent_id if provided in the form
        if (!empty($request->parent_id)) {
            $comment->parent_id = $request->parent_id;
        }

        $comment->save();

        // Redirect back to the previous page with a success message
        return back()->with('success', 'Comment posted successfully!');
    }
}
