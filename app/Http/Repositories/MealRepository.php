<?php


namespace App\Http\Repositories;


use App\Http\Traits\Custom;
use App\Models\Meal;

class MealRepository
{
    use Custom;
    public function getData($paginate = false , $withTrashed = false )
    {
        return ($paginate)? $this->getMeals('','', $withTrashed )->paginate($this->getPaginate())
            : $this->getMeals('','', $withTrashed)->get();
    }
    public function getMeals($user_id = '', $date = '', $withTrashed = false)
    {
        ($withTrashed)? $meals = Meal::withTrashed()->latest(): $meals = Meal::query();
        $meals->when((!empty($user_id)), function ($meals) use ($user_id) {
            $meals->where('user_id', $user_id);
        });
        $meals->when((!empty($date)), function ($meals) use ($date) {
            $meals->where('date', $date);
        });
        return $meals;
    }

    public function getMeal($id, $withTrashed = false)
    {
        return ($withTrashed)? Meal::withTrashed()->findOrFail($id) : Meal::findOrFail($id);
    }
}