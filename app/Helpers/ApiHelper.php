<?php
function api_errors($message = '', $statusCode = 403)
{
    return response()->json(['code' => 403, 'message' => $message], $statusCode);
}

function api_success($data, $statusCode = 200)
{
    return response()->json(array_merge(['code' => 200], $data), $statusCode);
}
