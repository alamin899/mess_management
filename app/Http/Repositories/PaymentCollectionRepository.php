<?php


namespace App\Http\Repositories;


use App\Http\Traits\Custom;
use App\Models\PaymentCollection;

class PaymentCollectionRepository
{
    use Custom;
    public function getData($paginate = false , $withTrashed = false , $status = '')
    {
        return ($paginate)? $this->getPaymentCollections('','','',$status,'', $withTrashed )
            ->paginate($this->getPaginate()) : $this->getPaymentCollections('','','',$status,'', $withTrashed)->get();
    }
    public function getPaymentCollections($user_id = '', $head_id = '', $status = '',  $withTrashed = false)
    {
        ($withTrashed) ? $paymentCollections = PaymentCollection::withTrashed()->latest() : $paymentCollections = PaymentCollection::query()->latest();
        $paymentCollections->when((!empty($user_id)), function ($paymentCollections) use ($user_id) {
            $paymentCollections->where('user_id', $user_id);
        });
        $paymentCollections->when((!empty($head_id)), function ($paymentCollections) use ($head_id) {
            $paymentCollections->where('head_id', $head_id);
        });
        $paymentCollections->when((!empty($status)), function ($paymentCollections) use ($status) {
            $paymentCollections->where('status', $status);
        });
        return $paymentCollections;
    }
}