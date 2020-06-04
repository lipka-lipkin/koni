<?php

namespace App\Helper;

class ResponseHelper
{
    public static function validation($data, $message = 'The given data was invalid.')
    {
        $response = [
            'message' => $message,
            'errors' => [],
        ];
        foreach($data as $key => $error)
        {
            if(!is_array($error))
            {
                $error = [$error];
            }
            $response['errors'][$key] = $error;
        }
        return response($response, 422);
    }

    public static function error($status, $message = 'The given data was invalid.', $data = [])
    {
        $response = [
            'message' => $message,
            'errors' => [],
        ];
        foreach($data as $key => $error)
        {
            if(!is_array($error))
            {
                $error = [$error];
            }
            $response['errors'][$key] = $error;
        }
        return response($response, $status);
    }
}