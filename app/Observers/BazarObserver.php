<?php

namespace App\Observers;

use App\Models\Bazar;
use Illuminate\Support\Facades\Auth;

class BazarObserver
{
    public $bazar;
    public $userId;
    public function __construct(Bazar $bazar){
        $this->bazar = $bazar;
        $this->userId = Auth::user()->id();
    }
    public function creating($bazar)
    {
        $bazar->created_by = $this->userId;
    }
    public function created($bazar)
    {
        $bazar->created_by = $this->userId;
    }
    public function updating($bazar)
    {
        $bazar->updated_by = $this->userId;
    }
    public function updated($bazar)
    {
        $bazar->updated_by = $this->userId;
    }
    public function deleting($bazar)
    {
        $bazar->deleted_by = $this->userId;
        $bazar->update();
    }
    public function restoring($bazar)
    {
        $bazar->deleted_by = null;
        $bazar->updated_by = $this->userId;
    }
}
