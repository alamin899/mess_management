<?php


namespace App\Http\Repositories;


use App\Models\Meal;

class MealRepository
{
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
}