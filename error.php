<?php
require_once "src/Helpers/Router.php";

Router::renderPage([
    "page" => "ErrorPage",
    "layout" => "PublicLayout",
    "customStyle" => "error-page"
]);