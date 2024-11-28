<?php
$dsn = "mysql:host=localhost;dbname=productDB;charset=utf8";
$username = "root";
$password = "";

$pdo = new PDO($dsn, $username, $password);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$stmt = $pdo->query("SELECT * FROM products");
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);

$output = "";
foreach ($products as $product) {
    $output .= "<li>{$product['name']} - " . number_format($product['price'], 0, ',', '.') . " VND</li>";
}
echo $output;
