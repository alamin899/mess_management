<?php


namespace App\Http\Repositories;


use App\Models\User;
use http\Env\Request;
use Illuminate\Support\Facades\Hash;

class UserManagementRepository
{
    public function index()
    {
        return $this->getUsers()->paginate(config('constant.PAGINATE'));
    }

    public function store($request)
    {
        return User::create([
            'name' => $request->name,
            'email' => $request->email,
            'status' => $request->status,
            'password' => Hash::make($request->password),
        ]);
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