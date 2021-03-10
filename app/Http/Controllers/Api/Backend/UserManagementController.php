<?php

namespace App\Http\Controllers\Api\Backend;

use App\Http\Controllers\Controller;
use App\Http\Repositories\UserManagementRepository;
use App\Http\Requests\UserRequest;
use App\Http\Resources\UserResource;
use App\Http\Traits\ApiReturnMessage;
use App\Models\User;
use Illuminate\Http\Request;

class UserManagementController extends Controller
{
    public $userManagementRepository;
    public function __construct(UserManagementRepository $userManagementRepository)
    {
        $this->userManagementRepository = $userManagementRepository;
    }

    public function index(Request $request)
    {
        return ($request->ajax()) ? UserResource::collection($this->userManagementRepository->getData(true, true)) : abort(401, 'Bad request');
    }
    public function userList(Request $request)
    {
        return ($request->ajax()) ? UserResource::collection($this->userManagementRepository->getData(false, true)) : abort(401, 'Bad request');
    }

    public function store(UserRequest $userRequest)
    {
        return ($this->userManagementRepository->store($this->customRequest($userRequest))) ?
            response()->json([
                'message' => "success"
            ], 200) : response()->json([
                'message' => "failed",
            ]);
    }

    public function show($id, Request $request)
    {
        return ($request->ajax()) ? new UserResource($this->userManagementRepository->show($id)) : abort('401', "Bad Request");
    }

    public function update(Request $request, $id)
    {
        return ($this->userManagementRepository->update($id, $this->customRequest($request))) ?
            response()->json([
                'message' => "success"
            ], 200) : response()->json([
                'message' => "failed"
            ]);
    }

    public function destroy($id, Request $request)
    {
        return ($request->ajax()) ? $this->userManagementRepository->destroy($id) : abort('401', "Bad Request");
    }

    public function restore($id, Request $request)
    {
        return ($request->ajax()) ? $this->userManagementRepository->restore($id) : abort('401', "Bad Request");
    }

    public function passUpdate(Request $request, $id)
    {
        if ($request->ajax()) {
            $this->validate($request, ['password' => ['required', 'string', 'min:8', 'confirmed']]);
            if ($this->userManagementRepository->passUpdate($request, $id)) {
                return ["success"];
            }
            return ["failed"];
        }
        abort('400', 'Unauthorized Request');
    }

    protected function customRequest($request)
    {
        return new Request([
            'name' => $request->name,
            'email' => $request->email,
            'image' => $request->image,
            'status' => $request->status['id'],
            'password' => $request->password,
        ]);
    }
}
