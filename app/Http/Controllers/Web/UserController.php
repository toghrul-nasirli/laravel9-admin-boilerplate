<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\StoreUserRequest;
use App\Http\Requests\User\UpdateUserRequest;
use App\Models\User;
use App\Services\UserService;

class UserController extends Controller
{
    public function index()
    {
        return view('users.index');
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(StoreUserRequest $request)
    {
        UserService::create($request->validated());

        return redirect()->route('users.index')->with('success', __('admin.added'));
    }

    public function edit($lang, User $user)
    {
        abort_if($user->id === 1, 401);

        return view('users.edit', compact('user'));
    }

    public function update($lang, User $user, UpdateUserRequest $request)
    {
        UserService::update($user, $request->validated());

        return redirect()->route('users.index')->with('success', __('admin.saved'));
    }
}
