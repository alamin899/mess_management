<?php


namespace App\Http\Repositories;


use App\Models\PaymentHead;

class PaymentHeadRepository
{

    public function index()
    {
        return $this->getPaymentHeads('','',true)->paginate(config('constant.PAGINATE'));
    }

    public function store($request)
    {
        return PaymentHead::firstOrCreate([
            'name' => $request->name,
        ],[
            'status' => $request->status
        ]);
    }

    public function show($id)
    {
        return $this->getPaymentHead($id);
    }

    public function update($id , $request)
    {
        $user = $this->getPaymentHead($id);
        $user->name = $request->name;
        $user->status = $request->status;
        $user->update();
        return $user;
    }

    public function destroy($id)
    {
        return $this->getPaymentHead($id)->delete();
    }

    public function restore($id)
    {
        return $this->getPaymentHead($id , true)->restore();
    }

    public function status($id, $status)
    {
        $paymentHead = $this->getPaymentHead($id , true);
        $paymentHead->status = $status;
        $paymentHead->update();
        if ($paymentHead->status == 1)
        {
            return "active";
        }
        elseif ($paymentHead->status == 0)
        {
            return "deactive";
        }
        else
        {
            return $paymentHead;
        }
    }

    public function getPaymentHeads($name = '' , $status = '' , $withTrashed = false)
    {
        ($withTrashed)?$paymentHeads = PaymentHead::withTrashed()->latest() : $paymentHeads = PaymentHead::query()->latest() ;
        $paymentHeads->when((!empty($name)), function ($paymentHeads) use ($name) {
            $paymentHeads->where('name', $name);
        });
        $paymentHeads->when((!empty($status)), function ($paymentHeads) use ($status) {
            $paymentHeads->where('status', $status);
        });
        return $paymentHeads;
    }

    public function getPaymentHead($id , $withTrashed = false)
    {
        if ($withTrashed)
        {
            $paymentHead = PaymentHead::withTrashed()->find($id);
        }
        else{
            $paymentHead = PaymentHead::find($id);
        }
        return $paymentHead;
    }
}