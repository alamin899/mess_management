<?php

namespace App\Http\Controllers\Api\Backend;

use App\Http\Controllers\Controller;
use App\Http\Repositories\PaymentHeadRepository;
use App\Http\Requests\PaymentHeadRequest;
use App\Http\Resources\PaymentHeadResource;
use Illuminate\Http\Request;

class PaymentHeadController extends Controller
{
    public function __construct(PaymentHeadRepository $paymentHeadRepository)
    {
        $this->paymentHeadRepository = $paymentHeadRepository;
    }

    public function index(Request $request)
    {
        if ($request->ajax())
        {
            return PaymentHeadResource::collection($this->paymentHeadRepository->index());
        }
        abort(401 , 'Bad request');
    }

    public function store(PaymentHeadRequest $paymentHeadRequest)
    {
        if ($this->paymentHeadRepository->store($paymentHeadRequest))
        {
            return response()->json([
                'message' => "success"
            ],200);
        }
        else return response()->json([
            'message' => "failed",
        ]);
    }

    public function show($id , Request $request)
    {
        if ($request->ajax())
        {
            return new PaymentHeadResource($this->paymentHeadRepository->show($id));
        }
        abort('401',"Bad Request");

    }

    public function update(PaymentHeadRequest $paymentHeadRequest, $id)
    {
        if ($this->paymentHeadRepository->update($id , $paymentHeadRequest))
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

    public function destroy($id , Request $request)
    {
        if ($request->ajax())
        {
            return $this->paymentHeadRepository->destroy($id);
        }
        abort('401',"Bad Request");
    }

    public function restore($id , Request $request)
    {
        if ($request->ajax())
        {
            return $this->paymentHeadRepository->restore($id);
        }
        abort('401',"Bad Request");
    }

    public function status($id, $status)
    {
        return $this->paymentHeadRepository->status($id, $status);
    }
}
