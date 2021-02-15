<?php

namespace App\Observers;

use App\Models\PaymentCollection;
use Illuminate\Support\Facades\Auth;

class PaymentCollectionObserver
{
    public $paymentCollection;
    public $userId;
    public function __construct(PaymentCollection $paymentCollection){
        $this->paymentCollection = $paymentCollection;
        $this->userId = Auth::user()->id();
    }
    public function creating($paymentCollection)
    {
        $paymentCollection->created_by = $this->userId;
    }
    public function created($paymentCollection)
    {
        $paymentCollection->created_by = $this->userId;
    }
    public function updating($paymentCollection)
    {
        $paymentCollection->updated_by = $this->userId;
    }
    public function updated($paymentCollection)
    {
        $paymentCollection->updated_by = $this->userId;
    }
    public function deleting($paymentCollection)
    {
        $paymentCollection->deleted_by = $this->userId;
        $paymentCollection->update();
    }
    public function restoring($paymentCollection)
    {
        $paymentCollection->deleted_by = null;
        $paymentCollection->updated_by = $this->userId;
    }
}
