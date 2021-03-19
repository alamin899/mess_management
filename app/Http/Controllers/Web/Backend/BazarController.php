<?php

namespace App\Http\Controllers\Web\Backend;

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
