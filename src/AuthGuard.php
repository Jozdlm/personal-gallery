<?php

/**
 * Validates that the user is logged in, and if not, redirects to the login page.
 */
function isLoggedGuard(): void
{
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    if (!isset($_SESSION['user']['id'])) {
        header("Location: login.php");
        exit;
    }
}

/**
 * Validates that the user has an anonymous session, and if not, redirects to the gallery.
 */
function isAnonGuard(): void
{
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    if (isset($_SESSION['user']['id'])) {
        header("Location: home.php");
        exit;
    }
}