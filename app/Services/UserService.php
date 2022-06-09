<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserService extends BaseService
{
    public static function withFilter($search, $orderBy, $orderDirection, $perPage, $is_admin)
    {
        return User::search([
            'id',
            'username',
            'email',
        ], $search)
            ->where('id', '!=', auth()->user()->id)
            ->where('id', '!=', 1)
            ->orderBy($orderBy, $orderDirection)
            ->paginate($perPage);
    }

    public static function create($data)
    {
        $data['password'] = Hash::make($data['password']);

        User::create($data);
    }

    public static function update($user, $data)
    {
        if ($data['password']) {
            $data['password'] = Hash::make($data['password']);
        } else {
            unset($data['password']);
        }

        $user->update($data);
    }
}
