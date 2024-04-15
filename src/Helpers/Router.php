<?php

final class Router
{
    public static function renderPage(array $options): void
    {
        $scopedStyle = $options['customStyle'] ?? '';
        $scopedScript = $options['scopedScript'] ?? '';
        $data = $options['data'] ?? '';

        if (!isset($options['page'])) {
            throw new Exception("The page variable it's a must to render a page");
        }

        if (is_array($data)) {
            extract($data);
        }

        $page = $options['page'];

        $layout = $options['layout'];
        require_once $_SERVER['DOCUMENT_ROOT'] . "/views/Shared/$layout.php";
    }
}
