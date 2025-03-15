<?php
require_once 'src/utils.php';

/**
 * Allow access only to logged users, otherwise redirects to login page.
 */
function sessionMiddleware(): void
{
    startSession();

    if (!isset($_SESSION['user']['id'])) {
        redirectTo('login.php');
    }
}

/**
 * Allow access only to annonymous users, otherwise redirects to the dashboard page.
 */
function publicPageMiddleware(): void
{
    startSession();

    if (isset($_SESSION['user']['id'])) {
        redirectTo('home.php');
    }
}