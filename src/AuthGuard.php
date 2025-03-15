<?php

/**
 * Validates that the user is logged in, and if not, redirects to the login page.
 */
function isLoggedGuard(): void
{
    startSession();

    if (!isset($_SESSION['user']['id'])) {
        redirectTo('login.php');
    }
}

/**
 * Validates that the user has an anonymous session, and if not, redirects to the gallery.
 */
function isAnonGuard(): void
{
    startSession();

    if (isset($_SESSION['user']['id'])) {
        redirectTo('home.php');
    }
}