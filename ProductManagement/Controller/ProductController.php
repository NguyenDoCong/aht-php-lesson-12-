<?php
require_once __DIR__ . '/../Model/ProductModel.php';

class ProductController
{
    private $model;

    public function __construct()
    {
        $this->model = new ProductModel('localhost', 'productDB', 'root', '');
    }

    public static function send($status, $message, $data = null)
    {
        header("Content-Type: application/json");
        http_response_code($status);
        echo json_encode([
            'status' => $status,
            'message' => $message,
            'data' => $data
        ]);
        exit;
    }

    public function index()
    {
        $products = $this->model->getAll();
        // ProductController::send(200, "Products retrieved successfully", $products);
        include 'View/view.php';
    }

    public function store($data)
    {
        $name = $data['name'] ?? '';
        $price = $data['price'] ?? '';

        if (!$name || !$price) {
            ProductController::send(400, "Name and price are required");
            return;
        }

        if ($this->model->create($name, $price)) {
            ProductController::send(201, "Product created successfully");
        } else {
            ProductController::send(500, "Failed to create product");
        }
    }
}
