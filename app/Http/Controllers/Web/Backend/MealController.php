<?php

namespace App\Http\Controllers\Web\Backend;

use App\Http\Controllers\Controller;
use App\Http\Repositories\MealRepository;
use App\Http\Requests\MealRequest;
use App\Http\Resources\MealResource;
use Illuminate\Http\Request;

class MealController extends Controller
{
    public $melaRepository;
    public function __construct(MealRepository $mealRepository)
    {
        $this->mealRepository = $mealRepository;
    }

    public function index(Request $request)
    {
        return ($request->ajax()) ? MealResource::collection($this->mealRepository->getData(true, true)) : abort(401, 'Bad request');
    }

    public function store(MealRequest $mealRequest)
    {
        return ($this->mealRepository->store($mealRequest)) ?
            response()->json([
                'message' => "success"
            ], 200) : response()->json([
                'message' => "failed",
            ]);
    }
}
