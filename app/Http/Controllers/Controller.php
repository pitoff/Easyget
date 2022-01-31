<?php

namespace App\Http\Controllers;

use App\Models\ManagerRequest;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    public static function ImageStr($n)
    {
        $xters = 'qwertyuiopasdfghjklzxcvbnmMNBVCXZLKJHGFDSAQWERTYUIOP0123456789';
        $newStr = '';

        for ($i=0; $i < $n; $i++) { 
            $index = rand(0, strlen($xters) - 1);
            $newStr .= $xters[$index];
        }
        return $newStr;
    }
}
