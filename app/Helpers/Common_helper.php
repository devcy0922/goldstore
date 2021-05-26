<?php
if (!function_exists('returnData')) {
    function returnData( bool $result = true, array $data = [], String $description = '', string $redirect = ''): array
    {
        return [
            'result' => $result,
            'data' => $data,
            'description' => $description ?? '',
            'redirect' => $redirect ?? '',
        ];
    }
}


if (!function_exists('printJson')) {
    function printJson(bool $result = true, $data = null, string $description = '', string $redirect = '')
    {
        exit(json_encode(returnData($result, $data, $description, $redirect)));
    }
}
?>