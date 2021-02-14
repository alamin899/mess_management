<?php


namespace App\Http\Traits;


trait Custom
{
    public function getPaginate()
    {
        return config('constant.PAGINATE');
    }

}