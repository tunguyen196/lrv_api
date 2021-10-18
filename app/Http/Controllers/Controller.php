<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function responseErrors($message = '', $statusCode = 403)
    {
        return api_errors($message, $statusCode);
    }

    public function responseSuccess($data, $statusCode = 200)
    {
        return api_success($data, $statusCode);
    }
}
