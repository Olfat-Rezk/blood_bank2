<?php

/**
 * @param $status
 * @param $message
 * @param null $data
 * @return \Illuminate\Http\JsonResponse
 */
function responseJson($status, $message, $data=null){
    $response = [
        'status'=>$status,
        'message'=>$message,
        'data'=>$data,
    ];
    return response()->json($response);
}
