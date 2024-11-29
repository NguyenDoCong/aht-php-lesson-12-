$("#addProductForm").submit(function (event) {
  event.preventDefault();
  let name = $("#productName").val();
  let price = $("#productPrice").val();

  $.ajax({
    url: "http://localhost/AHT_Nov/l12+/ProductManagement/products/add",
    method: "POST",
    contentType: "application/json",
    data: JSON.stringify({
      name: name,
      price: price,
    }),
    success: function (response) {
      alert("Product added successfully!");
      window.location.href =
        "http://localhost/AHT_Nov/l12+/ProductManagement/";
      getProducts();
    },
    error: function (xhr, status, error) {
      alert("Error adding product: " + error);
    },
  });
});
