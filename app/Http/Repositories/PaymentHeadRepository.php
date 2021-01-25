<?php


namespace App\Http\Repositories;


use App\Models\PaymentHead;

class PaymentHeadRepository
{

    public function index()
    {
        return $this->getPaymentHeads('','',true)->paginate(config('constant.PAGINATE'));
    }

    public function getPaymentHeads($name = '' , $status = '' , $withTrashed = false)
    {
        ($withTrashed)?$paymentHeads = PaymentHead::withTrashed()->latest() : $paymentHeads = PaymentHead::query()->latest() ;
        $paymentHeads->when((!empty($name)), function ($paymentHeads) use ($name) {
            $paymentHeads->where('name', $name);
        });
        $paymentHeads->when((!empty($status)), function ($paymentHeads) use ($status) {
            $paymentHeads->where('status', $status);
        });
        return $paymentHeads;
    }
}