<?php

namespace App\Traits;

use Hashids\Hashids;

trait Helper
{
    public function result($status = false, $data = [], $errors = [], $msg = '', $httpResponse = 200)
    {
        if (empty($data) && empty($errors)) {
            return response()->json(['status' => $status, 'message' => $msg, 'data' => []], $httpResponse);
        } elseif (empty($data) && !empty($errors)) {
            return response()->json(
                ['status' => $status, 'message' => $msg, 'data' => [], 'errors' => $errors],
                $httpResponse
            );
        } elseif (!empty($data) && empty($errors)) {
            return response()->json(['status' => $status, 'message' => $msg, 'data' => $data], $httpResponse);
        } else {
            return response()->json(
                ['status' => $status, 'message' => $msg, 'data' => $data, 'errors' => $errors],
                $httpResponse
            );
        }
    }

    public function hashEncode($hashedId)
    {
        $hashids = new Hashids('', 5);
        return $hashids->encode($hashedId);
    }

    public function hashDecode($hashedId)
    {
        $hashids = new Hashids('', 5);
        return $hashids->decode($hashedId)[0];
    }
}
