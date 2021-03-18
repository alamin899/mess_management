<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PaymentCollectionResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'user' => new UserResource($this->user),
            'paymentHead' => new PaymentHeadResource($this->paymentHead),
            'payment_date' => $this->payment_date,
            'amount' => $this->amount,
            'remarks' => $this->remarks,
            'deleted_at' => $this->deleted_at,
        ];
    }
}
