<?php

namespace App\Http\Controllers\Api\Backend;

use App\Http\Controllers\Controller;
use App\Http\Repositories\MealRepository;
use App\Http\Resources\MealResource;
use Illuminate\Http\Request;

class MealController extends Controller
{
    public function __construct(MealRepository $mealRepository)
    {
        $this->mealRepository = $mealRepository;
    }

    public function index(Request $request)
    {
        return ($request->ajax()) ? MealResource::collection($this->mealRepository->getData(true,true)) : abort(401 , 'Bad request');
    }
}
