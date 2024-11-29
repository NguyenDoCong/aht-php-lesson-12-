<h1>Bạn chắc chắn muốn xóa sản phẩm này?</h1>
<h3><?php echo $product["name"]; ?></h3>
<form id="deleteProductForm">
    <input type="hidden" id="productID" name="id" value="<?php echo $product["id"]; ?>" />
    <div class="form-group">
        <input type="submit" value="Delete" class="btn btn-danger" />
        <a class="btn btn-default" href="index.php">Cancel</a>
    </div>
</form>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="http://localhost/AHT_Nov/l12+/ProductManagement/assets/js/delete.js"></script>