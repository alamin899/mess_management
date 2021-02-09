<?php

namespace App\Http\Controllers\Api\Backend;

use App\Http\Controllers\Controller;
use App\Http\Repositories\PaymentScheduleRepository;
use App\Http\Resources\PaymentScheduleResource;
use App\Models\PaymentSchedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentScheduleController extends Controller
{
    public $paymentScheduleRepository;
    public function __construct(PaymentScheduleRepository $paymentScheduleRepository)
    {
        $this->paymentScheduleRepository = $paymentScheduleRepository;
    }

    public function index(Request $request)
    {
        return ($request->ajax()) ? PaymentScheduleResource::collection($this->paymentScheduleRepository->getData(true,true)) : abort(401 , 'Bad request');
    }

    public function store(Request $request)
    {
        $store = $this->paymentScheduleRepository->store($this->getArray($request));
        return ($store)? "success":"failed";
    }

    protected function getArray($request){
        $data = [];
        foreach ($request->payment_schedules as $payment_schedule) {
            $schedule = PaymentSchedule::where('user_id',$payment_schedule['user_id'])
                ->where('payment_head_id',$payment_schedule['payment_head_id'])
                ->where('paid_date',$payment_schedule['paid_date'])->first();
            if (!$schedule){
                $data[] = [
                    'user_id' => $payment_schedule['user_id'],
                    'payment_head_id' => $payment_schedule['payment_head_id'],
                    'paid_date' => $payment_schedule['paid_date'],
                    'status' => 1,
                    'payment_status' => 1,
                    'created_by' => Auth::id(),
                    'created_at' => now()->toDateTimeString()
                ];
            }
        }
        return $data;
    }


    public function show($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }

    public function restore($id)
    {
        //
    }

    public function status($id, $status)
    {
        //
    }
}
