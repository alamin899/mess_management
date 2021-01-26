<?php

namespace Database\Seeders;

use App\Models\PaymentHead;
use Illuminate\Database\Seeder;

class PaymentHeadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
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
