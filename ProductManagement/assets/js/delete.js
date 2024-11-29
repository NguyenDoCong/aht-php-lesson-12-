$("#deleteProductForm").submit(function (event) {
  event.preventDefault();
  let id = $("#productID").val();
  console.log("id:", id);

  $.ajax({
    url: "http://localhost/AHT_Nov/l12+/ProductManagement/products/delete",
    method: "POST",
    contentType: "application/json",
    data: JSON.stringify({
      id: id,
    }),
    success: function (response) {
      alert("Product deleted successfully!");
      window.location.href = "http://localhost/AHT_Nov/l12+/ProductManagement/";
      getProducts();
    },
    error: function (xhr, status, error) {
      alert("Error deleting product: " + error);
    },
  });
});
