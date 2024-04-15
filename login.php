<?php
require_once "src/Helpers/Router.php";
require_once "src/AuthGuard.php";
require_once "src/UserRepository.php";
require_once "src/AuthService.php";

isAnonGuard();

$message = "";

if (isset($_POST["email"]) && isset($_POST['password'])) {
    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
    $password = $_POST['password'];

    if (checkIfUserExist($email)) {
        $user = getUserByEmail($email);
        $hashedPassword = $user["password"];

        if (password_verify($password, $hashedPassword)) {
            createClientSession($user["id"], $user["username"], $user["email"]);
        } else {
            $message = "Wrong credentials";
        }
    } else {
        $message = "The email is not valid, please write correctly your email";
    }
}

Router::renderPage([
    "page" => "LoginPage",
    "layout" => "PublicLayout",
    "data" => $message
]);