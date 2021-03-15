<?php

namespace Database\Seeders;

use App\Models\PaymentHead;
use Illuminate\Database\Seeder;

class PaymentHeadSeeder extends Seeder
{
    public function run()
    {
        $paymentHeads = [
            [
                'name'=>'Bazar For Meal',
                'status'=>1
            ],
            [
                'name'=>'Extra Bazar',
                'status'=>1
            ],
        ];
        foreach ($paymentHeads as $paymentHead) {
            PaymentHead::create(array(
                'name' => $paymentHead['name'],
                'status' => $paymentHead['status'],
            ));
        }
    }
}
