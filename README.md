# Giới thiệu
**Ứng dụng quản lý bán tranh**

👨‍💻 **Phan Vũ Hoài Nam**

©️ **2024** - version **1.0.1**

## Mô tả 
Hệ thống quản lý bán tranh của chúng tôi được thiết kế với mục tiêu mang đến trải nghiệm mua sắm thuận tiện cho người dùng và hỗ trợ quản lý hiệu quả cho admin. Phía người mua, hệ thống cung cấp một giỏ hàng chứa các sản phẩm đã mua, giúp người dùng dễ dàng theo dõi lịch sử các đơn hàng đã mua. Người dùng có thể lọc các sản phẩm tranh theo thể loại, mức giá và các tiêu chí khác để tìm kiếm và lựa chọn tranh phù hợp với sở thích cá nhân.

Bên cạnh đó, hệ thống cho phép người mua duyệt qua các bức tranh thuộc nhiều thể loại khác nhau, từ phong cảnh, chân dung đến trừu tượng và nghệ thuật hiện đại. Các sản phẩm đều được cung cấp thông tin chi tiết, bao gồm tên tranh, giá bán,mô tả giúp người dùng dễ dàng đưa ra quyết định mua hàng.

Phía admin, hệ thống cung cấp các công cụ quản lý sản phẩm tranh, cho phép thêm mới, chỉnh sửa hoặc xóa các sản phẩm trong danh mục tranh. Admin có thể quản lý thông tin chi tiết của từng bức tranh, bao gồm thể loại, giá bán, và các thuộc tính khác để đảm bảo thông tin sản phẩm luôn chính xác và cập nhật.

Với giao diện thân thiện và dễ sử dụng, hệ thống giúp cả người mua và admin có thể thao tác nhanh chóng, tạo ra một môi trường mua sắm và quản lý hiệu quả.

## Chức năng
- **Sơ đồ khối** (Structural Diagram)
  
   ![Screenshot 2025-01-12 161315](https://github.com/user-attachments/assets/f4b5678b-958f-4d1a-802c-3ea4fa651f50)
  
- **Sơ đồ thuật toán** (Behavioural Diagram)
  # Filter

   ![Screenshot 2025-01-12 162507](https://github.com/user-attachments/assets/322e2051-90e3-495d-a764-5e1319f0f093)

- **Công nghệ** (Technologies): Dùng **PHP Laravel Framework**

## Cài đặt (Installation)
1. Cài đặt dự án bằng lệnh:
   ```bash
   composer create-project --prefer-dist laravel/laravel banTranh
2. Di chuyển thư mục dự án:
    ```bash
   cd banTranh
3. Cài đặt đặt phụ thuộc:
    ```bash
   composer install
4. Sao chep file .env.example thành .env:
    ```bash
   cp .env.example .env
5. Tạo khoá ứng dụng (APP_Key) cho Laravel:
    ```bash
   php artisan key:generate
6. Chạy migration để tạo các bảng trong cơ sở dữ liệu:
    ```bash
   php artisan migrate
7. Khởi động server:
    ```bash
   php artisan serve
## Cài đặt đường dẫn trong git Codespaces
![Screenshot 2025-01-12 103230](https://github.com/user-attachments/assets/f8ccbb68-059a-457a-9b61-a469f36e80a3)

![Screenshot 2025-01-12 103224](https://github.com/user-attachments/assets/cd03cd6a-7180-475d-a768-385402074166)

![Screenshot 2025-01-12 103201](https://github.com/user-attachments/assets/ff096b85-2d64-4d72-9700-9962c1914a9b)


## Triển khai (Deployment)
[Deployment Link](https://potential-barnacle-pvj6gx7pgpjhw9g-8000.app.github.dev/)
