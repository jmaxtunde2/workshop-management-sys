<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    //
    public function sendResponse($res, $result, $message)
    {
        $response = [
            'success' => $res,
            'data'    => $result,
            'message' => $message,
        ];


        return response()->json($response, 200);
    }
}
