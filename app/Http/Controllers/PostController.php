<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\PostService;

class PostController extends Controller
{
    protected $postService;

    public function __construct(PostService $postService)
    {
        $this->postService = $postService;
    }

    public function index()
    {
        $posts = $this->postService->getAllPosts();
        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        $this->postService->createPost($request->only('title', 'content'));
        return redirect()->route('posts.index')->with('success', 'Post created successfully!');
    }

    public function edit($id)
    {
        $post = $this->postService->getPostById($id);
        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        $this->postService->updatePost($id, $request->only('title', 'content'));
        return redirect()->route('posts.index')->with('success', 'Post updated successfully!');
    }

    public function destroy($id)
    {
        $this->postService->deletePost($id);
        return redirect()->route('posts.index')->with('success', 'Post deleted successfully!');
    }
}
