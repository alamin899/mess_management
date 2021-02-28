<?php


namespace App\Http\Repositories;


use App\Http\Traits\Custom;

class PaymentCollectionRepository
{
    use Custom;
    public function getData($paginate = false , $withTrashed = false , $status = '')
    {
        return ($paginate)? $this->getPaymentCollections('','','',$status,'', $withTrashed )
            ->paginate($this->getPaginate()) : $this->getPaymentCollections('','','',$status,'', $withTrashed)->get();
    }
    public function getPaymentCollections()
    {
        
    }
}