<?php

namespace App\Services\Post;

use App\Models\Post;
use Illuminate\Database\Eloquent\Collection;

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

}
