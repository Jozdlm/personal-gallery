<?php
require_once "src/Helpers/Router.php";
require_once "src/AuthGuard.php";
require_once "src/UserRepository.php";
require_once "src/AuthService.php";

isAnonGuard();

$message = "";

if (isset($_POST['username']) && isset($_POST["email"]) && isset($_POST['password'])) {
    $username = trim($_POST['username']);
    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
    $password = password_hash(trim($_POST['password']), PASSWORD_BCRYPT, ['cost' => 10]);

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