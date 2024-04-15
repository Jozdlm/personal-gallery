<?php
require_once "src/Helpers/Router.php";
require_once "src/AuthService.php";
require_once "src/UserRepository.php";
require_once "src/AuthGuard.php";

isLoggedGuard();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ($_POST['id'] > 0) {
        $newValues = [
            "username" => $_POST['username'],
            "email" => $_POST['email']
        ];

        updateUser($_POST['id'], $newValues);
        updateClientSession("username", $_POST['username']);
        updateClientSession("email", $_POST['email']);

        header("Location:account.php");
    }
}

Router::renderPage([
    "page" => "AccountPage",
    "layout" => "AppLayout",
    "customStyle" => "home",
    "data" => [
        "clientSession" => getClientSession()
    ]
]);