<?php
namespace App\Services;

use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class PostService
{
    public function getAllPosts($filters = [])
    {
        $query = Post::with(['user', 'category']);

        if (isset($filters['category_id'])) {
            $query->where('category_id', $filters['category_id']);
        }

        if (isset($filters['tag'])) {
            $query->where('tag', 'like', '%' . $filters['tag'] . '%');
        }

        if (isset($filters['title'])) {
            $query->where('title', 'like', '%' . $filters['title'] . '%');
        }

        return $query->paginate(10);
    }

    public function createPost(array $data)
    {
        $data['user_id'] = Auth::id();
        return Post::create($data);
    }

    public function updatePost(Post $post, array $data)
    {
        $post->update($data);
        return $post;
    }

    public function deletePost(Post $post)
    {
        return $post->delete();
    }
}