<?php

namespace Model;

use PDO;
use PDOException;

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

    public function get($id)
    {
        $sql = "SELECT * FROM `products` WHERE `id`=:id";
        $statement = $this->pdo->prepare($sql);
        $statement->bindParam('id', $id);
        $statement->execute();
        $result = $statement->fetch();
        return $result;
    }

    public function edit($id, $name, $price)
    {
        $sql = "UPDATE `products` SET `name`=:name,`price`=:price WHERE `id`=:id";
        $statement = $this->pdo->prepare($sql);
        $statement->bindParam('id', $id);
        $statement->bindParam('name', $name);
        $statement->bindParam('price', $price);
        return $statement->execute();
    }

    public function delete($id)
    {
        $sql = "DELETE FROM `products` WHERE `id`=:id";
        $statement = $this->pdo->prepare($sql);
        $statement->bindParam('id', $id);
        if ($statement->execute()) {
            return true;
        }
        return false;
    }

    public function search($query)
    {
        $sql = "SELECT * FROM `products` WHERE `name` LIKE :keyword";
        $statement = $this->pdo->prepare($sql);
        $keyword = "%" . $query . "%";
        $statement->bindParam('keyword', $keyword);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
}
