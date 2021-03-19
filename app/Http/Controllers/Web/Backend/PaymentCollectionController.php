<?php

namespace App\Http\Controllers\Web\Backend;

use App\Http\Controllers\Controller;
use App\Http\Repositories\PaymentCollectionRepository;
use App\Http\Requests\PaymentCollectionRequest;
use App\Http\Resources\PaymentCollectionResource;
use Illuminate\Http\Request;

class PaymentCollectionController extends Controller
{
    public $paymentCollectionRepository;
    public function __construct(PaymentCollectionRepository $paymentCollectionRepository)
    {
        $this->paymentCollectionRepository = $paymentCollectionRepository;
    }

    public function index(Request $request)
    {
        return ($request->ajax()) ? PaymentCollectionResource::collection($this->paymentCollectionRepository->getData(true,true)) : abort(401 , 'Bad request');
    }

    public function store(PaymentCollectionRequest $paymentCollectionRequest)
    {
        // store with ternary operator
        return ($this->paymentCollectionRepository->store($paymentCollectionRequest)) ?
            response()->json([
                'message' => "success"
            ],200)  : response()->json([
                'message' => "failed",
            ]);
    }
}
