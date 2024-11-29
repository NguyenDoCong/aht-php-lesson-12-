<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product List</title>
</head>

<body>

    <div class="container">
        <a href="http://localhost/AHT_Nov/l12+/ProductManagement/products/add" class="add-product-btn">Add New Product</a>

        <h1>Product List</h1>
        <div>
            <form id="searchForm" action="http://localhost/AHT_Nov/l12+/ProductManagement/products/search">
                <input type="hidden" name="page" value="todos">
                <input type="text" id="search" name="search" value="<?php echo isset($_GET['search']) ? $_GET['search'] : ''; ?>">
                <input type="submit" value="Search">
            </form>
            <br>
        </div>
        <table id="productTable" class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <!-- Products will be displayed here -->
            </tbody>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="http://localhost/AHT_Nov/l12+/ProductManagement/assets/js/app.js"></script>

</body>

</html>