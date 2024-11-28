<?php

class ProductModel
{
    private $pdo;

    public function __construct($host, $dbname, $username, $password)
    {
        try {
            $this->pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Database connection failed: " . $e->getMessage());
        }
    }

    public function getAll()
    {
        $stmt = $this->pdo->prepare("SELECT * FROM products");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create($name, $price)
    {
        $stmt = $this->pdo->prepare("INSERT INTO products (name, price) VALUES (:name, :price)");
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':price', $price);
        return $stmt->execute();
    }
}
