<?php

namespace App\Observers;

use App\Models\PaymentHead;
use Illuminate\Support\Facades\Auth;

class PaymentHeadObserver
{
    public $paymentHead;
    public $userId;
    public function __construct(PaymentHead $paymentHead){
        $this->paymentHead = $paymentHead;
        $this->userId = Auth::guard('api')->user();
    }
    public function creating($paymentHead)
    {
        $paymentHead->created_by = $this->userId;
    }
    public function created($paymentHead)
    {
        $paymentHead->created_by = $this->userId;
    }
    public function updating($paymentHead)
    {
        $paymentHead->updated_by = $this->userId;
    }
    public function updated($paymentHead)
    {
        $paymentHead->updated_by = $this->userId;
    }
    public function deleting($paymentHead)
    {
        $paymentHead->deleted_by = $this->userId;
        $paymentHead->update();
    }
    public function restoring($paymentHead)
    {
        $paymentHead->deleted_by = null;
        $paymentHead->updated_by = $this->userId;
    }
}
