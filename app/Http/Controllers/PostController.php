<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        return Post::all();
    }

    public function store(Request $request)
    {
        try {
            $post = new Post();
            $post->title = $request->title;
            $post->body = $request->body;

            if($post->save()){
                return response()->json(['status' => 'success', 'message' => 'Post created successfully']);
            }
        } catch (\Throwable $th) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $post = Post::findOrFail($id);
            $post->title = $request->title;
            $post->body = $request->body;

            if($post->save()){
                return response()->json(['status' => 'success', 'message' => 'Post updated successfully']);
            }
        } catch (\Throwable $th) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }

    public function destroy(Request $request, $id)
    {
        try {
            $post = Post::findOrFail($id);

            if($post->delete()){
                return response()->json(['status' => 'success', 'message' => 'Post deleted successfully']);
            }
        } catch (\Throwable $th) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }
}
