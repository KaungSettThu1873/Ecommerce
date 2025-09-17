<?php

namespace App\Helpers;

class ApiResponse
{
    public static function success($data=null,$message='Successful',$code=200)
    {
        return response()->json([
            'success' => true,
            'code'    => $code,
            'message' => $message,
            'data'    => $data
        ],$code);
    }

    public static function error($message='Error',$errors=null,$code =400)
    {
        $response = [
            'success' => false,
            'code'    => $code,
            'message' => $message
        ];

        if ($errors)
        {
            $response['errors'] = $errors;
        }

        return response()->json($response,$code);
    }

}
