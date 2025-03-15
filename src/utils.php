<?php

/**
 * Returns the value of a query parameter or null if it doesn't exist.
 */
function getHttpParam(string $param): string|null
{
    return $_GET[$param] ?? null;
}

/**
 * Redirects to the specified URL and stops further execution.
 */
function redirectTo(string $url): void
{
    header("Location: $url");
    exit;
}

/**
 * Starts the session if it hasn't already been started.
 */
function startSession(): void
{
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
}

/**
 * Create a directory if it doesn't exist.
 */
function createDirectoryIfNeeded(string $path): void
{
    if (!is_dir($path)) {
        mkdir($path, 0777, true);
    }
}


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
        $componentsFolder = $_SERVER['DOCUMENT_ROOT'] . "/views/Components";

        $layout = $options['layout'];
        require_once $_SERVER['DOCUMENT_ROOT'] . "/views/Shared/$layout.php";
    }
}