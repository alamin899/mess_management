<?php


namespace App\Http\Repositories;


use App\Http\Traits\Custom;
use App\Models\PaymentHead;
use phpDocumentor\Reflection\Types\Integer;

class PaymentHeadRepository
{
    use Custom;
    public function getData($paginate = false , $withTrashed = false , $status = '')
    {
        return ($paginate)? $this->getPaymentHeads('',$status, $withTrashed )->paginate($this->getPaginate())
            : $this->getPaymentHeads('',$status, $withTrashed)->get();
    }

    public function store($request)
    {
        return PaymentHead::firstOrCreate([
            'name' => $request->name,
        ], [
            'status' => $request->status
        ]);
    }

    public function show($id)
    {
        return $this->getPaymentHead($id);
    }

    public function update($id, $request)
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
        return $this->getPaymentHead($id, true)->restore();
    }

    public function status($id, $status)
    {
        $paymentHead = $this->getPaymentHead($id, true);
        $paymentHead->status = $status;
        $paymentHead->update();
        if ($paymentHead->status == 1) {
            return "active";
        } elseif ($paymentHead->status == 0) {
            return "deactive";
        } else {
            return $paymentHead;
        }
    }

    public function getPaymentHeads($name = '', $status = '', $withTrashed = false)
    {
        ($withTrashed) ? $paymentHeads = PaymentHead::withTrashed()->latest() : $paymentHeads = PaymentHead::query()->latest();
        $paymentHeads->when((!empty($name)), function ($paymentHeads) use ($name) {
            $paymentHeads->where('name', $name);
        });
        $paymentHeads->when((!empty($status)), function ($paymentHeads) use ($status) {
            $paymentHeads->where('status', $status);
        });
        return $paymentHeads;
    }

    public function getPaymentHead($id, $withTrashed = false , $status = '')
    {
        $paymentHead =($withTrashed)? PaymentHead::withTrashed() : PaymentHead::query();
        $paymentHead->when((!empty($status)), function ($paymentHead) use ($status) {
            $paymentHead->where('status', $status);
        });
        return $paymentHead->find($id);
    }
}