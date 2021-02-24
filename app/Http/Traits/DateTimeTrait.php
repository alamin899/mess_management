<?php


namespace App\Http\Traits;


trait DateTimeTrait
{
    public function showDate($date = null, $format = "d-M-Y")
    {
        if ($date) {
            return date($format, strtotime($date));
        }
        return date($format);
    }

    public function showDateInForm($date = null, $format = "Y-m-d")
    {
        if ($date) {
            return date($format, strtotime($date));
        }
        return date($format);
    }
}