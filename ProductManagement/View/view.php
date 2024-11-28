<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Management</title>
    <link rel="stylesheet" href="/assets/css/style.css">
</head>

<body>
    <div class="container">
        <h1>Product List</h1>
        <table id="productTable">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Price</th>
                </tr>
            </thead>
            <tbody>
                <!-- Products will be displayed here -->
                <?php if (!empty($products)): ?>
                    <?php foreach ($products as $product): ?>
                        <tr>
                            <td><?= htmlspecialchars($product['id']) ?></td>
                            <td><?= htmlspecialchars($product['name']) ?></td>
                            <td><?= htmlspecialchars($product['price']) ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="3">No products found.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>

        <h2>Add New Product</h2>
        <form id="addProductForm">
            <input type="text" id="productName" name="name" placeholder="Product Name" required>
            <input type="number" id="productPrice" name="price" placeholder="Product Price" required>
            <button type="submit">Add Product</button>
        </form>
    </div>
    <script src="http://localhost/AHT%20Nov/l12+/ProductManagement/assets/js/app.js"></script> <!-- Đường dẫn tới app.js -->
</body>

</html>