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

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax())
        {
            return PaymentHeadResource::collection($this->paymentHeadRepository->index());
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
            return new PaymentHeadResource($this->paymentHeadRepository->show($id));
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
