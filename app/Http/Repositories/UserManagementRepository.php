<?php


namespace App\Http\Repositories;


use App\Models\User;

class UserManagementRepository
{
    public function index()
    {
        return $this->getUsers()->paginate(config('constant.PAGINATE'));
    }

    public function getUsers($name = '' , $email = '' )
    {
        $users = User::query()->latest();
        $users->when((!empty($name)), function ($users) use ($name) {
            $users->where('name', $name);
        });
        $users->when((!empty($email)), function ($users) use ($email) {
            $users->where('email', $email);
        });
        return $users;
    }

    public function getUser($id)
    {
        return User::find($id);
    }

}