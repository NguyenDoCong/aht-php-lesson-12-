<?php
class ProductAPI
{
    private $pdo;

    public function __construct($host, $db, $user, $pass)
    {
        try {
            $this->pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            $this->sendResponse(500, "Database connection failed: " . $e->getMessage());
        }
    }

    public function sendResponse($statusCode, $message)
    {
        http_response_code($statusCode);
        echo json_encode(['status' => $statusCode === 201 ? 'success' : 'error', 'message' => $message]);
    }

    // Lấy tất cả sản phẩm
    public function getProducts()
    {
        $stmt = $this->pdo->query("SELECT * FROM products");
        $products = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if ($products) {
            echo json_encode(['status' => 'success', 'data' => $products]);
        } else {
            $this->sendResponse(404, "No products found");
        }
    }

    // Thêm sản phẩm mới
    public function createProduct($name, $price)
    {
        $stmt = $this->pdo->prepare("INSERT INTO products (name, price) VALUES (:name, :price)");
        if ($stmt->execute([':name' => $name, ':price' => $price])) {
            $this->sendResponse(201, "Product created successfully");
        } else {
            $this->sendResponse(500, "Failed to create product");
        }
    }
}
