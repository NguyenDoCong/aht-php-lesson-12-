<?php
require_once __DIR__ . '/Controller/ProductController.php';

$method = $_SERVER['REQUEST_METHOD'];
$request = isset($_SERVER['PATH_INFO']) ? explode('/', trim($_SERVER['PATH_INFO'], '/')) : [];

$controller = new ProductController();

if (empty($request) || $request[0] !== 'products') {
    header("HTTP/1.0 404 Not Found");
    // echo "Invalid endpoint";
    $controller->index();
    exit;
}


switch ($method) {
    case 'GET':
        $controller->index();
        break;
    case 'POST':
        $data = json_decode(file_get_contents('php://input'), true);
        $controller->store($data);
        break;
    default:
        header("HTTP/1.0 405 Method Not Allowed");
        echo "Method Not Allowed";
        break;
}
