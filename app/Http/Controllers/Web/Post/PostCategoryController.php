<?php

namespace App\Http\Controllers\Web\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\StorePostCategoryRequest;
use App\Http\Requests\Post\UpdatePostCategoryRequest;
use App\Models\Post\PostCategory;
use App\Services\Post\PostCategoryService;

class PostCategoryController extends Controller
{
    public function index()
    {
        return view('posts.categories.index');
    }

    public function create()
    {
        return view('posts.categories.create');
    }

    public function store(StorePostCategoryRequest $request)
    {
        PostCategoryService::create($request->validated());

        return redirect()->route('post-categories.index', _lang())->with('success', __('admin.added'));
    }

    public function edit($lang, PostCategory $postCategory)
    {
        return view('posts.categories.edit', compact('postCategory'));
    }

    public function update($lang, PostCategory $postCategory, UpdatePostCategoryRequest $request)
    {
        PostCategoryService::update($postCategory, $request->validated());

        return redirect()->route('post-categories.index', _lang())->with('success', __('admin.saved'));
    }
}
