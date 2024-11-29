$("#editProductForm").submit(function (event) {
  event.preventDefault();
  let id = $("#productID").val();
  let name = $("#productName").val();
  let price = $("#productPrice").val();

  $.ajax({
    url: "http://localhost/AHT_Nov/l12+/ProductManagement/products/edit",
    method: "POST",
    contentType: "application/json",
    data: JSON.stringify({
      id: id,
      name: name,
      price: price,
    }),
    success: function (response) {
      alert("Product updated successfully!");
      window.location.href = "http://localhost/AHT_Nov/l12+/ProductManagement/";
      getProducts();
    },
    error: function (xhr, status, error) {
      alert("Error adding product: " + error);
    },
  });
});
