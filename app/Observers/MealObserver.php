<?php

namespace App\Observers;

use App\Models\Meal;
use Illuminate\Support\Facades\Auth;

class MealObserver
{
    public $meal;
    public $userId;
    public function __construct(Meal $meal){
        $this->meal = $meal;
        $this->userId = Auth::user()->id();
    }
    public function creating($meal)
    {
        $meal->created_by = $this->userId;
    }
    public function created($meal)
    {
        $meal->created_by = $this->userId;
    }
    public function updating($meal)
    {
        $meal->updated_by = $this->userId;
    }
    public function updated($meal)
    {
        $meal->updated_by = $this->userId;
    }
    public function deleting($meal)
    {
        $meal->deleted_by = $this->userId;
        $meal->update();
    }
    public function restoring($meal)
    {
        $meal->deleted_by = null;
        $meal->updated_by = $this->userId;
    }
}
