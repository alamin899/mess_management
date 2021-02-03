<?php


namespace App\Http\Repositories;


use App\Models\User;
use http\Env\Request;
use Illuminate\Support\Facades\Hash;
use Image;

class UserManagementRepository
{
    public function getData($paginate = false , $withTrashed = false )
    {
        return ($paginate)? $this->getUsers('','', $withTrashed )->paginate(config('constant.PAGINATE'))
            : $this->getUsers('','', $withTrashed)->get();
    }

    public function show($id)
    {
        return $this->getUser($id);
    }

    public function store($request)
    {
        return User::create([
            'name' => $request->name,
            'email' => $request->email,
            'image' => $this->imageUpload($request->image),
            'status' => $request->status,
            'password' => Hash::make($request->password),
        ]);
    }

    public function update($id , $request)
    {
        $user = $this->getUser($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->status = $request->status;
        if ($request->image != null)
        {
            $user->image = $this->imageUpload($request->image);
        }
        $user->update();
        return $user;
    }

    public function imageUpload($image)
    {
        if ($image){
            $strpos = strpos($image,';');
            $sub = substr($image,0,$strpos);
            $extention = explode('/',$sub)[1];
            $name = time().".".$extention;
            $img = Image::make($image)->resize(200, 200);
            $folderPath = "file/images/";
            $upload_path = public_path()."/".$folderPath;
            if ($img->save($upload_path.$name)){
                return $name;
            }
        }
        else return null;
    }

    public function passUpdate($request,$id)
    {
        $user = $this->getUser($id);
        $user->password = Hash::make($request->password);
        $user->update();
        return $user;
    }
    public function destroy($id)
    {
        return $this->getUser($id)->delete();
    }

    public function restore($id)
    {
        return $this->getUser($id , true)->restore();
    }

    public function getUsers($name = '' , $email = '' , $withTrashed = false)
    {
        ($withTrashed)?$users = User::withTrashed()->latest() : $users = User::query()->latest() ;
        $users->when((!empty($name)), function ($users) use ($name) {
            $users->where('name', $name);
        });
        $users->when((!empty($email)), function ($users) use ($email) {
            $users->where('email', $email);
        });
        return $users;
    }

    public function getUser($id , $withTrashed = false)
    {
        if ($withTrashed)
        {
            $user = User::withTrashed()->find($id);
        }
        else{
            $user = User::find($id);
        }
        return $user;
    }

}