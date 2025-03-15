<?php
require_once "src/utils.php";

Router::renderPage([
    "page" => "ErrorPage",
    "layout" => "PublicLayout",
    "customStyle" => "error-page"
]);