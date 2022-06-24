<?php

namespace App\Services\Post;

use App\Models\Post\Post;
use App\Services\BaseService;

class PostService extends BaseService
{
    public static function withFilter($search, $orderBy, $orderDirection, $perPage, $status, $category)
    {
        return Post::search([
            'position',
            'title',
            'text',
        ], $search)
            ->with('category')
            ->when($category != 0, function ($query) use ($category) {
                $query->where('category_id', $category);
            })->orderBy($orderBy, $orderDirection)
            ->paginate($perPage);
    }

    public static function create($data)
    {
        $data['position'] = Post::max('position') + 1;
        $data['slug'] = _slugify($data['title']);
        $data['image'] = _storeImage('posts', $data['image']);

        Post::create($data);
    }

    public static function update($post, $data)
    {
        $data['slug'] = _slugify($data['title']);
        if (request()->has('image')) {
            _deleteFile('images/posts', $post->image);
            $data['image'] = _storeImage('posts', $data['image']);
        }

        $post->update($data);
    }
}
