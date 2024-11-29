<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
</head>

<body>
    <div class="container">
        <h2>Edit Product</h2>
        <form id="editProductForm">
            <input type="hidden" id="productID" name="id" value="<?php echo $product["id"]; ?>" />
            <input type="text" id="productName" name="name" placeholder="Product Name" required value="<?php echo $product["name"]; ?>">
            <input type="number" id="productPrice" name="price" placeholder="Product Price" required value="<?php echo $product["price"]; ?>">
            <button type="submit">Update</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="http://localhost/AHT_Nov/l12+/ProductManagement/assets/js/edit.js"></script>
</body>

</html>