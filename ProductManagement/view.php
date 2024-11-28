<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Management</title>
    <link rel="stylesheet" href="style.css">
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
            </tbody>
        </table>

        <h2>Add New Product</h2>
        <form id="addProductForm">
            <input type="text" id="productName" name="name" placeholder="Product Name" required>
            <input type="number" id="productPrice" name="price" placeholder="Product Price" required>
            <button type="submit">Add Product</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        // Hàm để lấy danh sách sản phẩm
        function getProducts() {
            $.ajax({
                url: 'index.php/products',
                method: 'GET',
                success: function(response) {
                    let products = JSON.parse(response);
                    let tableBody = $('#productTable tbody');
                    tableBody.empty();
                    products.forEach(function(product) {
                        tableBody.append(`
                            <tr>
                                <td>${product.id}</td>
                                <td>${product.name}</td>
                                <td>${product.price}</td>
                            </tr>
                        `);
                    });
                }
            });
        }

        // Gửi dữ liệu sản phẩm mới qua POST
        $('#addProductForm').submit(function(event) {
            event.preventDefault();
            let name = $('#productName').val();
            let price = $('#productPrice').val();

            $.ajax({
                url: 'index.php/products',
                method: 'POST',
                data: {
                    name: name,
                    price: price
                }, // Gửi dữ liệu qua POST
                success: function(response) {
                    alert('Product added successfully!');
                    getProducts(); // Cập nhật danh sách sản phẩm
                }
            });
        });

        // Gọi hàm để lấy danh sách sản phẩm khi trang được tải
        $(document).ready(function() {
            getProducts();
        });
    </script>
</body>

</html>