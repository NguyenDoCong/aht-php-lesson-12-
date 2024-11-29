<?php
require_once __DIR__ . '/Controller/ProductController.php';

$method = $_SERVER['REQUEST_METHOD'];
$requestUri = $_SERVER['REQUEST_URI'];
$scriptName = $_SERVER['SCRIPT_NAME'];

$basePath = dirname($scriptName);

$route = str_replace($basePath, '', $requestUri);
$route = strtok($route, '?');
$request = explode('/', trim($route, '/'));

if ($route === '/' || $route === '') {
    $request = [];
} else {
    $request = explode('/', trim($route, '/'));
}

// var_dump($basePath, $route, $request);
// exit;

$controller = new ProductController();

if (empty($request)) {
    include 'View/view.php';
} elseif ($request[0] === 'products') {
    if ($method === 'GET' && count($request) === 1) {
        $controller->getAll();
    } elseif ($method === 'GET' && isset($request[1]) && $request[1] === 'add') {
        include 'View/create.php';
    } elseif ($method === 'POST' && isset($request[1]) && $request[1] === 'add') {
        $data = json_decode(file_get_contents('php://input'), true);
        $controller->store($data);
    } elseif ($method === 'GET' && isset($request[1]) && $request[1] === 'edit') {
        $controller->editView();
    } elseif ($method === 'POST' && isset($request[1]) && $request[1] === 'edit') {
        $data = json_decode(file_get_contents('php://input'), true);
        $controller->edit($data);
    } elseif ($method === 'GET' && isset($request[1]) && $request[1] === 'delete') {
        $controller->deleteView();
    } elseif ($method === 'POST' && isset($request[1]) && $request[1] === 'delete') {
        $data = json_decode(file_get_contents('php://input'), true);
        $controller->delete($data);
    } elseif ($method === 'GET' && isset($request[1]) && $request[1] === 'search') {
        $data = json_decode(file_get_contents('php://input'), true);
        $controller->search();
    } else {
        header("HTTP/1.0 405 Method Not Allowed");
        echo "Method Not Allowed";
    }
} else {
    header("HTTP/1.0 404 Not Found");
    echo "Page Not Found";
}

?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">