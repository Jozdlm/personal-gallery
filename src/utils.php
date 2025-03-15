<?php

function getHttpParam(string $param): string|null
{
    return $_GET[$param] ?? null;
}

