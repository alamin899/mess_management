<?php

namespace App\Http\Controllers\Api\Backend;

use App\Http\Controllers\Controller;
use App\Http\Repositories\UserManagementRepository;
use App\Http\Requests\UserRequest;
use App\Http\Resources\UserResource;
use App\Http\Traits\ApiReturnMessage;
use Illuminate\Http\Request;

class UserManagementController extends Controller
{
    public function __construct(UserManagementRepository $userManagementRepository)
    {
        $this->userManagementRepository = $userManagementRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax())
        {
            return UserResource::collection($this->userManagementRepository->index());
        }
        abort(401 , 'Bad request');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $userRequest)
    {
        $userStore = $this->userManagementRepository->store($this->customRequest($userRequest));
        if ($userStore)
        {
            return response()->json([
                'message' => "success"
            ],200);
        }
        else return response()->json([
            'message' => "failed",
        ]);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id , Request $request)
    {
        if ($request->ajax())
        {
            return new UserResource($this->userManagementRepository->show($id));
        }
        abort('401',"Bad Request");

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $userUpdate = $this->userManagementRepository->update($id , $request);
        if ($userUpdate)
        {
            return response()->json([
                'message' => "success"
            ],200);
        }
        else
        {
            return response()->json([
                'message' => "failed"
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id , Request $request)
    {
        if ($request->ajax())
        {
            return $this->userManagementRepository->destroy($id);
        }
        abort('401',"Bad Request");
    }

    public function restore($id , Request $request)
    {
        if ($request->ajax())
        {
            return $this->userManagementRepository->restore($id);
        }
        abort('401',"Bad Request");
    }
    public function passUpdate(Request $request,$id)
    {
        if ($request->ajax())
        {
            $this->validate($request,['password' => ['required', 'string', 'min:8', 'confirmed']]);
            $userPassUpdate = $this->userManagementRepository->passUpdate($request,$id);
            if ($userPassUpdate) {
                return ["success"];
            }
                return ["failed"];
        }
            abort('400','Unauthorized Request');
    }

    protected function customRequest($request)
    {
        return new Request([
            'name' => $request->name,
            'email' => $request->email,
            'image' => $request->image,
            'status' => $request->status['id'],
            'password' =>$request->password,
        ]);
    }
}
