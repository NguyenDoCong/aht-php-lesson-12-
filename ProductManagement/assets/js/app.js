function getProducts() {
  $.ajax({
    url: "http://localhost/AHT_Nov/l12+/ProductManagement/products",
    method: "GET",
    success: function (response) {
      let products = response.data;
      let tableBody = $("#productTable tbody");
      tableBody.empty();
      products.forEach(function (product) {
        tableBody.append(`
                  <tr>
                      <td>${product.id}</td>
                      <td>${product.name}</td>
                      <td>${product.price}</td>
                      <td><a class="btn btn-primary" href="http://localhost/AHT_Nov/l12+/ProductManagement/products/edit?id=${product.id}" role="button">Edit</a></td>
                      <td><a class="btn btn-primary" href="http://localhost/AHT_Nov/l12+/ProductManagement/products/delete?id=${product.id}" role="button">Delete</a></td>
                  </tr>
              `);
      });
    },
  });
}

$("#searchForm").submit(function (event) {
  event.preventDefault();
  let query = $("#search").val();
  console.log("query:", query);

  $.ajax({
    url: "http://localhost/AHT_Nov/l12+/ProductManagement/products/search",
    method: "GET",
    contentType: "application/json",
    data: { query: query },
    success: function (response) {
      let products = response.data;
      let tableBody = $("#productTable tbody");
      tableBody.empty();
      products.forEach(function (product) {
        tableBody.append(`
                  <tr>
                      <td>${product.id}</td>
                      <td>${product.name}</td>
                      <td>${product.price}</td>
                      <td><a class="btn btn-primary" href="http://localhost/AHT_Nov/l12+/ProductManagement/products/edit?id=${product.id}" role="button">Edit</a></td>
                      <td><a class="btn btn-primary" href="http://localhost/AHT_Nov/l12+/ProductManagement/products/delete?id=${product.id}" role="button">Delete</a></td>
                  </tr>
              `);
      });
    },
    error: function (xhr, status, error) {
      alert("Error finding product: " + error);
    },
  });
});

$(document).ready(function () {
  getProducts();
});
