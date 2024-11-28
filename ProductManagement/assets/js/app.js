document.addEventListener("DOMContentLoaded", function () {
  const apiUrl = "index.php/products";

  function getProducts() {
    fetch(apiUrl)
      .then((response) => response.json())
      .then((data) => {
        const tableBody = document.querySelector("#productTable tbody");
        tableBody.innerHTML = "";
        data.data.forEach((product) => {
          const row = `
                        <tr>
                            <td>${product.id}</td>
                            <td>${product.name}</td>
                            <td>${product.price}</td>
                        </tr>
                    `;
          tableBody.innerHTML += row;
        });
      });
  }

  document
    .querySelector("#addProductForm")
    .addEventListener("submit", function (e) {
      e.preventDefault();
      const name = document.querySelector("#productName").value;
      const price = document.querySelector("#productPrice").value;

      fetch(apiUrl, {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({ name, price }),
      })
        .then((response) => response.json())
        .then(() => {
          alert("Product added successfully!");
          getProducts();
        });
    });

  getProducts();
});
