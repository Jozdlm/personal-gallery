<?php
require_once "src/utils.php";
require_once "src/middlewares.php";
require_once "src/UserRepository.php";
require_once "src/AuthService.php";

publicPageMiddleware();

$message = "";

if (isset($_POST['username']) && isset($_POST["email"]) && isset($_POST['password'])) {
    $username = trim($_POST['username']);
    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
    $password = trim($_POST['password']);

    $user = [
        'username' => $username,
        'email' => $email,
        'password' => $password,
    ];

    if (createUser($user)) {
        header('Location: home.php');
    } else {
        $message = "There was an error trying to create the user";
    }
}

Router::renderPage([
    "page" => "RegisterPage",
    "layout" => "PublicLayout",
    "data" => $message
]);