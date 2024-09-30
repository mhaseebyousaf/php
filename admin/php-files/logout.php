<?php

function getFullUrl() {
    $protocol = ($_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";

    $host = $_SERVER['HTTP_HOST'];

    $requestUri = $_SERVER['REQUEST_URI'];

    $url = explode("/",$requestUri);
    $fullUrl = $protocol . $host . "/" . $url[1] . "/" . $url[2];

    return $fullUrl;
}
$admin_login = getFullUrl();
session_start();
session_unset();
session_destroy();

header("location:{$admin_login}");

?>