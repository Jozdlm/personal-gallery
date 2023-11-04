<?php

require_once("src/UserRepository.php");

function checkIfUserExist($userEmail)
{
    $user = getUserByEmail($userEmail);
    return ($user) ? true : false;
}