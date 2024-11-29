# aht-php-lesson-12-plus

## Xây dựng API Quản lý Sản phẩm với PHP và MySQL sử dụng phương thức GET và POST

### Database

- `id` (int, tự động tăng)
- `name` (varchar)
- `price` (float)

### Model (ProductModel.php)

- getAllProducts
- createProduct
- editProduct
- deleteProduct
- searchProducts

### Controller (ProductController.php)

- **GET `/products`**: Hiển thị tất cả sản phẩm từ cơ sở dữ liệu.
- **POST `/products`**: Thêm sản phẩm mới vào cơ sở dữ liệu.
- **POST `/edit-product`**: Cập nhật thông tin sản phẩm dựa trên `id`.
- **POST `/delete-product`**: Xóa sản phẩm theo `id`.
- **GET `/products?query=search_term`**: Tìm kiếm sản phẩm theo từ khóa.

### View (product_list.php)

- thêm sản phẩm
- sửa sản phẩm
- xóa sản phẩm

### index.php

- xử lý routing và gửi yêu cầu đến controller
- tìm kiếm và hiển thị kết quả khi tìm kiếm theo tên

## Notes

### 28/11

- Sử dụng postman để gửi request
- Sử dụng jquery và ajax để gửi request
- Gửi response từ php

### 29/11

- Đường dẫn thư mục không nên chứa ký tự trống
- Dùng request_uri để lấy đường dẫn

## Mindmap
![jQuery](https://github.com/user-attachments/assets/7dc42f32-640c-4271-ab57-ab714c91af51)

