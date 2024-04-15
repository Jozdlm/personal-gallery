<?php
require_once "src/Helpers/Router.php";
require_once "src/AuthService.php";
require_once "src/AuthGuard.php";

isLoggedGuard();

Router::renderPage([
    "page" => "AccountPage",
    "layout" => "AppLayout",
    "customStyle" => "home",
    "data" => [
        "clientSession" => getClientSession()
    ]
]);