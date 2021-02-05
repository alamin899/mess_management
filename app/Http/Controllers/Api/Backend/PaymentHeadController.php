<?php

namespace App\Http\Controllers\Api\Backend;

use App\Http\Controllers\Controller;
use App\Http\Repositories\PaymentHeadRepository;
use App\Http\Requests\PaymentHeadRequest;
use App\Http\Resources\PaymentHeadResource;
use App\Models\PaymentHead;
use Illuminate\Http\Request;

class PaymentHeadController extends Controller
{
    public $paymentHeadRepository;
    public function __construct(PaymentHeadRepository $paymentHeadRepository)
    {
        $this->paymentHeadRepository = $paymentHeadRepository;
    }

    public function index(Request $request)
    {
        return ($request->ajax()) ? PaymentHeadResource::collection($this->paymentHeadRepository->getData(true,true)) : abort(401 , 'Bad request');
    }

    public function listData(Request $request)
    {
//        return ["PaymentHead::all()"];
        return ($request->ajax()) ? PaymentHeadResource::collection($this->paymentHeadRepository->getData(false,false)) : abort(401 , 'Bad request');
    }

    public function store(PaymentHeadRequest $paymentHeadRequest)
    {
        return ($this->paymentHeadRepository->store($this->customRequest($paymentHeadRequest))) ?
            response()->json([
                'message' => "success"
            ],200)  : response()->json([
                'message' => "failed",
            ]);
    }

    public function show($id , Request $request)
    {
        return ($request->ajax()) ? new PaymentHeadResource($this->paymentHeadRepository->show($id)) : abort('401',"Bad Request");
    }

    public function update(PaymentHeadRequest $paymentHeadRequest, $id)
    {
        return ($this->paymentHeadRepository->update($id , $this->customRequest($paymentHeadRequest))) ?
            response()->json([
                'message' => "success"
            ],200)  : response()->json([
                'message' => "failed",
            ]);
    }

    public function destroy($id , Request $request)
    {
        return ($request->ajax()) ? $this->paymentHeadRepository->destroy($id) : abort('401',"Bad Request");
    }

    public function restore($id , Request $request)
    {
        return ($request->ajax()) ? $this->paymentHeadRepository->restore($id) : abort('401',"Bad Request");
    }

    public function status($id, $status , Request $request)
    {
        return ($request->ajax()) ? $this->paymentHeadRepository->status($id, $status) : abort('401',"Bad Request");
    }

    protected function customRequest($request)
    {
        return new Request([
            'name' => $request->name,
            'status' => $request->status['id'],
        ]);
    }
}
