<?php


namespace App\Http\Repositories;


use App\Models\User;
use http\Env\Request;
use Illuminate\Support\Facades\Hash;
use Image;

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
            'image' => $this->imageUpload($request->image),
            'status' => $request->status,
            'password' => Hash::make($request->password),
        ]);
    }


    public function imageUpload($image)
    {
        $strpos = strpos($image,';');   //position of ";"
        $sub = substr($image,0,$strpos);  // only part of index 0 to starposition from image
        $extention = explode('/',$sub)[1];   // divide an array into part where "/" here [1] means second part of "/"
        $name = time().".".$extention;                //image extenction
        $img = Image::make($image)->resize(200, 200);
        $folderPath = "file/images/";
        $upload_path = public_path()."/".$folderPath;
        if ($img->save($upload_path.$name)){
            return $upload_path.$name;
        }
        else return null;
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