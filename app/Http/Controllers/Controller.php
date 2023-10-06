<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function responseSuccess($data, $message = "Successful", $status_code = JsonResponse::HTTP_OK): \Illuminate\Http\JsonResponse
    {
        return response()->json([
            'status'  => true,
            'message' => $message,
            'data'    => $data
        ], $status_code);
    }

    public function responseError($errors, $message = 'Data is invalid', $status_code = Response::HTTP_BAD_REQUEST): \Illuminate\Http\JsonResponse
    {
        return response()->json([
            'status'  => false,
            'message' => $message,
            'errors'  => $errors
        ], $status_code);
    }
}
