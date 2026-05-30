<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{ 

    public function index(Request $request)
    {
        $query = Post::with(['user', 'category']);

        if ($request->has('category_id')) {
            $query->where('category_id', $request->category_id);
        }

        if ($request->has('tag')) {
            $query->where('tag', 'like', '%' . $request->tag . '%');
        }

        if ($request->has('title')) {
            $query->where('title', 'like', '%' . $request->title . '%');
        }

        $posts = $query->paginate(10);

        return response()->json($posts);
    }

    public function store(StorePostRequest $request)
    {
        $data = $request->validated();
        $data['user_id'] = Auth::id();
        
        $post = Post::create($data);

        return response()->json([
            'message' => 'Post criado com sucesso',
            'post' => $post->load(['user', 'category']),
        ], 201);
    }

    public function show(Post $post)
    {
        return response()->json($post->load(['user', 'category']));
    }

    public function update(UpdatePostRequest $request, Post $post)
    {
        if ($post->user_id !== Auth::id()) {
            return response()->json(['message' => 'Não autorizado'], 403);
        }

        $post->update($request->validated());

        return response()->json([
            'message' => 'Post atualizado com sucesso',
            'post' => $post->load(['user', 'category']),
        ]);
    }

    public function destroy(Post $post)
    {
        if ($post->user_id !== Auth::id()) {
            return response()->json(['message' => 'Não autorizado'], 403);
        }

        $post->delete();

        return response()->json([
            'message' => 'Post deletado com sucesso'
        ]);
    }
}