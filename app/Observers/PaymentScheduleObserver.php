<?php

namespace App\Observers;

use App\Models\PaymentSchedule;
use Illuminate\Support\Facades\Auth;

class PaymentScheduleObserver
{
    public $paymentSchedule;
    public $userId;
    public function __construct(PaymentSchedule $paymentSchedule){
        $this->paymentSchedule = $paymentSchedule;
        $this->userId = Auth::guard('api')->id();
    }
    public function creating($paymentSchedule)
    {
        $paymentSchedule->created_by = $this->userId;
    }
    public function created($paymentSchedule)
    {
        $paymentSchedule->created_by = $this->userId;
    }
    public function updating($paymentSchedule)
    {
        $paymentSchedule->updated_by = $this->userId;
    }
    public function updated($paymentSchedule)
    {
        $paymentSchedule->updated_by = $this->userId;
    }
    public function deleting($paymentSchedule)
    {
        $paymentSchedule->deleted_by = $this->userId;
        $paymentSchedule->update();
    }
    public function restoring($paymentSchedule)
    {
        $paymentSchedule->deleted_by = null;
        $paymentSchedule->updated_by = $this->userId;
    }
}
