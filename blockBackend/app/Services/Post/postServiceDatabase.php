<?php

namespace App\Services\Post;

use App\Models\Post;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;

class postServiceDatabase
{
    /**
     * @param int $categoryId
     * @return mixed
     */
    public function getPostsByCategoryId(int $categoryId): mixed
    {
        return Post::where('category_id', $categoryId)->get();
    }

    /**
     * @return Collection
     */
    public function getPosts(): Collection
    {
        return Post::all();
    }

    public function create(array $data)
    {
        return Post::create([
            'title' => $data['title'],
            'content' => $data['content'],
            'user_id' => $_SESSION['user_id'],
            'category_id' => $data['category_id'],
        ]);
    }

}
