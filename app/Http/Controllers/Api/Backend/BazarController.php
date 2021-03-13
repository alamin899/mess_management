<?php

namespace App\Http\Controllers\Api\Backend;

use App\Http\Controllers\Controller;
use App\Http\Repositories\BazarRepository;
use Illuminate\Http\Request;

class BazarController extends Controller
{
    public function __construct(BazarRepository $bazarRepository)
    {
        $this->bazarRepository = $bazarRepository;
    }
}
