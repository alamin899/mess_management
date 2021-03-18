<?php

namespace App\Http\Resources;

use App\Models\PaymentHead;
use Illuminate\Http\Resources\Json\JsonResource;

class PaymentScheduleResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'user' => new UserResource($this->user),
            'paymentHead' => new PaymentHeadResource($this->paymentHead),
            'paid_date' => $this->paid_date,
            'status' => $this->status,
            'payment_status' => $this->payment_status,
            'deleted_at' => $this->deleted_at,
        ];
    }
}
