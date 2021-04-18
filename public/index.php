<?php
require "../bootstrap.php";

use App\Controllers\UserController;

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");
header("Access-Control-Allow-Methods: OPTIONS,GET,POST,PUT,DELETE");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri = explode('/', $uri);

// user endpoint /user
// everything else results in a 404 Not Found
if ($uri[1] !== 'user') {
    header("HTTP/1.1 404 Not Found");
    exit();
}

// the user id is, of course, optional and must be a number:
$user_id = null;
if (isset($uri[2])) {
    $user_id = (int) $uri[2];
}

$request_method = $_SERVER["REQUEST_METHOD"];

// pass the request method and user ID to the PersonController and process the HTTP request:
$controller = new UserController($request_method, $user_id);
$controller->processRequest();
