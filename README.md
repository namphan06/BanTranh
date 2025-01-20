# Giới thiệu
**Ứng dụng quản lý bán tranh**

👨‍💻 **Phan Vũ Hoài Nam**

©️ **2024** - version **1.0.1**

## Mô tả 
Hệ thống quản lý bán tranh của chúng tôi được thiết kế với mục tiêu mang đến trải nghiệm mua sắm thuận tiện cho người dùng và hỗ trợ quản lý hiệu quả cho admin. Phía người mua, hệ thống cung cấp một giỏ hàng chứa các sản phẩm đã mua, giúp người dùng dễ dàng theo dõi lịch sử các đơn hàng đã mua. Người dùng có thể lọc các sản phẩm tranh theo thể loại, mức giá và các tiêu chí khác để tìm kiếm và lựa chọn tranh phù hợp với sở thích cá nhân.

Bên cạnh đó, hệ thống cho phép người mua duyệt qua các bức tranh thuộc nhiều thể loại khác nhau, từ phong cảnh, chân dung đến trừu tượng và nghệ thuật hiện đại. Các sản phẩm đều được cung cấp thông tin chi tiết, bao gồm tên tranh, giá bán,mô tả giúp người dùng dễ dàng đưa ra quyết định mua hàng.

Phía admin, hệ thống cung cấp các công cụ quản lý sản phẩm tranh, cho phép thêm mới, chỉnh sửa hoặc xóa các sản phẩm trong danh mục tranh. Admin có thể quản lý thông tin chi tiết của từng bức tranh, bao gồm thể loại, giá bán, và các thuộc tính khác để đảm bảo thông tin sản phẩm luôn chính xác và cập nhật.

Với giao diện thân thiện và dễ sử dụng, hệ thống giúp cả người mua và admin có thể thao tác nhanh chóng, tạo ra một môi trường mua sắm và quản lý hiệu quả.

## Chức năng chính
- Quản lý tài khoản
- Quản lý sản phẩm
- Quản lý đơn hàng được đặt


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

## Giao diện website
# Giới thiệu
![Screenshot_20-1-2025_135134_127 0 0 1](https://github.com/user-attachments/assets/09242354-1dac-43d8-bb95-a3b22b65fa61)
# Tìm hiểu thêm
![Screenshot_20-1-2025_135651_127 0 0 1](https://github.com/user-attachments/assets/8a5821aa-5fca-4d4e-9b32-2148f1bb8c92)
# Đăng kí, đăng nhập
![Screenshot 2025-01-20 135757](https://github.com/user-attachments/assets/d4e35826-bb31-4bdd-92fc-1e80dac543fb)
![Screenshot 2025-01-20 135923](https://github.com/user-attachments/assets/44291db9-708c-4236-be66-fc46a66b56a1)
# Trang chủ
![Screenshot_20-1-2025_14026_127 0 0 1](https://github.com/user-attachments/assets/ef03ceb3-a3f6-49af-8f2a-5b9b86deb54b)
# Thông tin sản phẩm
![Screenshot_20-1-2025_14226_127 0 0 1](https://github.com/user-attachments/assets/8289eb26-4f31-4792-b205-17a51e7bed24)
# điền thông tin nhận hàng
![Screenshot 2025-01-20 140511](https://github.com/user-attachments/assets/feb94132-efad-470b-80f8-b789db7af02a)
# Xác nhận lại thông tin đặt hàng
![Screenshot_20-1-2025_14718_127 0 0 1](https://github.com/user-attachments/assets/b9e5977b-59c3-41f0-bf8d-386319f55bc2)
# Giỏ hàng
![Screenshot 2025-01-20 141318](https://github.com/user-attachments/assets/e445d443-8db3-48d6-8bd3-1c4801b996b6)
# Thông tin tài khoản người dùng
![Screenshot 2025-01-20 141348](https://github.com/user-attachments/assets/b90b9bf7-4ed8-43bb-9663-ec5f227ee2b7)
# Lọc sản phẩm (thể loại,min,max)
![Screenshot 2025-01-20 141505](https://github.com/user-attachments/assets/c82dd27e-be17-40b2-bc3b-005cea5a27cd)
# Trang chủ (admin)
![Screenshot_20-1-2025_141618_127 0 0 1](https://github.com/user-attachments/assets/e0804b25-9509-4b0a-a2ee-4b883978ebb7)
# Thông tin sản phẩm (admin)
![Screenshot_20-1-2025_141618_127 0 0 1](https://github.com/user-attachments/assets/18e37cc6-d704-41ed-a490-913be1085ad0)
# Thêm sửa sản phẩm (admin)
![Screenshot_20-1-2025_141923_127 0 0 1](https://github.com/user-attachments/assets/dc6512e5-fefe-44e3-9743-5178adb41fb9)
# Thêm sửa thể loại (admin)
![Screenshot 2025-01-20 142108](https://github.com/user-attachments/assets/2a74665a-cdc8-4742-9af3-5f97413324d5)

## Tài liệu tham khảo 
[link1](https://www.itsolutionstuff.com/post/laravel-11-crud-application-example-tutorialexample.html)

[link2](https://www.itsolutionstuff.com/post/laravel-11-custom-user-login-and-registration-tutorialexample.html#)
## Triển khai (Deployment)
[Deployment Link](https://potential-barnacle-pvj6gx7pgpjhw9g-8000.app.github.dev/)
