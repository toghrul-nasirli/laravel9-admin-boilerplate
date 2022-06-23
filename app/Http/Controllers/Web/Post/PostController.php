<?php

namespace App\Http\Controllers\Web\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\StorePostRequest;
use App\Http\Requests\Post\UpdatePostRequest;
use App\Models\Post\Post;
use App\Services\Post\PostCategoryService;
use App\Services\Post\PostService;

class PostController extends Controller
{
    public function index()
    {
        return view('posts.index');
    }

    public function create()
    {
        $categories = PostCategoryService::all();
     
        return view('posts.create', compact('categories'));
    }

    public function store(StorePostRequest $request)
    {
        PostService::create($request->validated());

        return redirect()->route('posts.index', _lang())->with('success', __('admin.added'));
    }

    public function edit($lang, Post $post)
    {
        $categories = PostCategoryService::all();
        
        return view('posts.edit', compact('post', 'categories'));
    }

    public function update($lang, Post $post, UpdatePostRequest $request)
    {
        PostService::update($post, $request->validated());

        return redirect()->route('posts.index', _lang())->with('success', __('admin.saved'));
    }
}
