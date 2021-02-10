<?php


namespace App\Http\Traits;


trait Payment
{
    public function getPaymentStatus()
    {
        return config('constant.PAYMENT_STATUS');
    }
}