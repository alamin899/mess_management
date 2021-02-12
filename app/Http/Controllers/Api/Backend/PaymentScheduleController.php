<?php

namespace App\Http\Controllers\Api\Backend;

use App\Http\Controllers\Controller;
use App\Http\Repositories\PaymentScheduleRepository;
use App\Http\Resources\PaymentScheduleResource;
use App\Http\Traits\Payment;
use App\Models\PaymentSchedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentScheduleController extends Controller
{
    use Payment;
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
    public function show($id , Request $request)
    {
        return ($request->ajax()) ? new PaymentScheduleResource($this->paymentScheduleRepository->show($id)) : abort('401', "Bad Request");
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

    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id , Request  $request)
    {
        return ($request->ajax()) ? $this->paymentScheduleRepository->destroy($id) : abort(401 , 'Bad request');

    }

    public function restore($id)
    {
        //
    }

    public function status($id, $status)
    {
        //
    }

    public function paymentStatus()
    {
        return $this->getPaymentStatus();
    }
}
