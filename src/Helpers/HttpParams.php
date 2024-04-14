<?php

final class HttpParams
{
    public static function get(string $param): string|null
    {
        $isParam = isset($_GET[$param]);
        return ($isParam) ? $_GET[$param] : $isParam;
    }
}
