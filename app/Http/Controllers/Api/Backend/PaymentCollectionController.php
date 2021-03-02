<?php

namespace App\Http\Controllers\Api\Backend;

use App\Http\Controllers\Controller;
use App\Http\Repositories\PaymentCollectionRepository;
use Illuminate\Http\Request;

class PaymentCollectionController extends Controller
{
    public function __construct(PaymentCollectionRepository $paymentCollectionRepository)
    {
        $this->paymentCollectionRepository = $paymentCollectionRepository;
    }
}
