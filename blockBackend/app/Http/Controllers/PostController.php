<?php

namespace App\Http\Controllers;

use App\Services\Post\postServiceDatabase;
use  Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

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

    public function create(Request $request)
    {
        try {
            $data = $request->all();
            $this->postServiceDatabase->create($data);
            return response()->json(['message' => 'Post created successfully']);

        } catch (\Exception $e) {
            return response()->json(['message' => 'Failed to create post'], 400);
        }
    }
}
