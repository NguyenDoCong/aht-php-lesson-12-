<?php
require_once __DIR__ . '/../Model/ProductModel.php';

use Model\ProductModel;

class ProductController
{
    private $model;

    public function __construct()
    {
        $this->model = new ProductModel('localhost', 'productdb', 'root', '');
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

    public function getAll()
    {
        $products = $this->model->getAll();
        if ($products) {
            ProductController::send(200, 'success', $products);
        } else {
            ProductController::send(404, "No products found");
        }
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

    public function editView()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $id = $_GET['id'];
            // echo $id;
            $product = $this->model->get($id);
            include 'View/edit.php';
        }
    }

    public function edit($data)
    {
        $id = $data['id'];
        $name = $data['name'] ?? '';
        $price = $data['price'] ?? '';

        error_log("Data received for edit: " . print_r($data, true));

        if (!$name || !$price) {
            ProductController::send(400, "Name and price are required");
            return;
        }

        if ($this->model->edit($id, $name, $price)) {
            ProductController::send(201, "Product updated successfully");
        } else {
            ProductController::send(500, "Failed to create product");
        }
    }

    public function deleteView()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $id = $_GET['id'];
            // echo $id;
            $product = $this->model->get($id);
            include 'View/delete.php';
        }
    }

    public function delete($data)
    {
        $id = $data['id'];
        error_log("Data received for delete: " . print_r($data, true));

        if ($this->model->delete($id)) {
            ProductController::send(201, "Product deleted successfully");
        } else {
            ProductController::send(500, "Failed to delete product");
        }
    }

    public function search()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $query = $_GET['query'];
            // $query = $data['query'];
            $products = $this->model->search($query);
            if ($products) {
                ProductController::send(200, 'success', $products);
            } else {
                ProductController::send(500, "Not found");
                $products = $this->model->getAll();
            }
            include 'View/view.php';
        }
    }
}
