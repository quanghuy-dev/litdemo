<?php

namespace App\Repositories;

use App\Models\Post;
use Illuminate\Support\Facades\DB;

class PostRepository extends BaseRepository
{
    protected $perPageUser = 10;

    public function getModel()
    {
        return Post::class;
    }

    public function create($request)
    {
        $post = $this->model->create([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $request->image,
            'status' => $request->status,
        ]);

        return $post;
    }
}
