<?php

namespace App\Http\Controllers\Api\Backend;

use App\Http\Controllers\Controller;
use App\Http\Repositories\PaymentCollectionRepository;
use App\Http\Resources\PaymentCollectionResource;
use Illuminate\Http\Request;

class PaymentCollectionController extends Controller
{
    public function __construct(PaymentCollectionRepository $paymentCollectionRepository)
    {
        $this->paymentCollectionRepository = $paymentCollectionRepository;
    }

    public function index(Request $request)
    {
        return ($request->ajax()) ? PaymentCollectionResource::collection($this->paymentCollectionRepository->getData(true,true)) : abort(401 , 'Bad request');
    }
}
