<?php
require_once 'ProductAPI.php';

// Khởi tạo đối tượng ProductAPI
$api = new ProductAPI('localhost', 'productDB', 'root', '');

// Lấy phương thức HTTP và URI
$method = $_SERVER['REQUEST_METHOD'];
$request = explode('/', trim($_SERVER['PATH_INFO'], '/'));

switch ($method) {
    case 'GET':
        if ($request[0] === 'products') {
            $api->getProducts();
        } else {
            $api->sendResponse(404, "Endpoint not found");
        }
        break;
    case 'POST':
        if ($request[0] === 'products') {
            $name = $_POST['name'] ?? '';
            $price = $_POST['price'] ?? '';

            if (!$name || !$price) {
                $api->sendResponse(400, "Name and price are required");
            } else {
                $api->createProduct($name, $price);
            }
        } else {
            $api->sendResponse(404, "Endpoint not found");
        }
        break;
    default:
        $api->sendResponse(405, "Method Not Allowed");
        break;
}
