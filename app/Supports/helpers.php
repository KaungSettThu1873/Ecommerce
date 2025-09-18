<?php

use App\Helpers\ApiResponse;

if(!function_exists('api_success'))
{
    function api_success($data=null,$message='Successful',$code = 200)
    {
        return ApiResponse::success($data,$message,$code);
    }
}

if(!function_exists('api_error'))
{
    function api_error($message='Error',$errors = null,$code = 400)
    {
        return ApiResponse::error($message,$errors,$code);
    }
}
