<?php

namespace App\Libraries;

use Illuminate\Http\Response;

class Api
{
    public static function response($result = null, $statusCode = Response::HTTP_OK)
    {
        $dataResponse = [
            STATUS_KEY  => $statusCode == Response::HTTP_OK ? true : false,
            MESSAGE_KEY => $result[MESSAGE_KEY] ?? '',
            DATA_KEY    => $result[DATA_KEY] ?? null,
        ];

        return response()->json($dataResponse, $statusCode);
    }
}
