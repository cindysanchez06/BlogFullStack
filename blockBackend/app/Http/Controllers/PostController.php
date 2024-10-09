<?php

namespace App\Http\Controllers;

use App\Services\Post\postServiceDatabase;
use  Illuminate\Http\JsonResponse;

class PostController extends Controller
{
    protected postServiceDatabase $postServiceDatabase;

    /**
     * @param postServiceDatabase $postServiceDatabase
     */
    public function __construct(postServiceDatabase $postServiceDatabase)
    {
        $this->postServiceDatabase = $postServiceDatabase;
    }

    /**
     * @param int $categoryId
     * @return JsonResponse
     */
    public function index(int $categoryId ): JsonResponse
    {
        try {
            if ($categoryId) {
                $posts = $this->postServiceDatabase->getPostsByCategoryId($categoryId);
                return response()->json($posts);
            }
            return response()->json($this->postServiceDatabase->getPosts());
        } catch (\Exception $e) {
            return response()->json(['message' => 'Failed to get posts'], 400);

        }
    }
}
