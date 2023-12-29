# Bảng câu hỏi khảo sát 

> Khách hàng : Người truy cập website để xem sản phẩm và mua sắm trực tuyến, có thể thực hiện các chức năng sau : 
●	Đăng ký: đăng ký bằng tài khoản mail.
●	Đăng nhập: có lưu session cho người dùng.
●	Tìm kiếm sản phẩm: tìm kiếm các sản phẩm theo tên, có kết hợp lọc sản phẩm theo danh mục, phân trang kết quả danh sách sản phẩm.
●	Xem chi tiết sản phẩm: Hệ thống cung cấp các thông tin của sản phẩm như tên sản phẩm, hình ảnh đại diện, đơn giá, mô tả cho sản phẩm, giới thiệu sản phẩm,…
●	Thêm vào giỏ hàng: Thêm nhanh sản phẩm vào giỏ hàng, thêm sản phẩm vào giỏ hàng chi tiết (số lượng thêm vào giỏ) 
●	Quản lý giỏ hàng: Hệ thống cung cấp các chức năng cho phép người dùng xem danh sách sản phẩm hiện tại trong giỏ hàng, cập nhật lại số lượng của sản phẩm trong giỏ hàng, xóa sản phẩm khỏi giỏ hàng.
●	Đặt mua hàng: Cung cấp tên, địa chỉ, số điện thoại người mua hàng, thanh toán cho đơn hàng.
●	Xem lịch sử đặt hàng: Mã đơn hàng, thông tin chi tiết các sản phẩm trong đơn hàng, ngày giờ đặt mua, tìm kiếm các đơn hàng theo sđt,… 
●	Chỉnh sửa thông tin tài khoản: chỉnh sửa họ tên, đổi mật khẩu,…

> Quản lý và Nhân viên có các chức năng sau:
●	Quản lý sản phẩm: Xem danh sách các sản phẩm trong hệ thống, tìm kiếm theo tên sản phẩm, tạo sản phẩm mới, chỉnh sửa thông tin sản phẩm, thay đổi trạng thái kinh doanh của sản phẩm, xóa sản phẩm.
●	Quản lý danh mục sản phẩm: Xem danh sách các danh mục sản phẩm trong hệ thống, tìm kiếm theo tên danh mục, tạo danh mục mới, chỉnh sửa danh mục, thay đổi trạng thái kinh doanh của danh mục, xóa danh mục.
●	Quản lý tài khoản người dùng: Xem danh sách các tài khoản, tìm kiếm theo tên tài khoản, khóa/mở khóa tài khoản, chỉnh sửa thông tin người dùng, xóa tài khoản.
●	Quản lý vai trò ( phân quyền ): Xem danh sách các vai trò, thêm vai trò mới, chỉnh sửa vai trò, xóa vai trò.
●	Xử lý đơn hàng/hóa đơn: Duyệt danh sách các hóa đơn từ khách hàng, cập nhật trạng thái các đơn hàng, xóa đơn hàng.
●	Thống kê doanh thu: Thống kê tổng sản phẩm trong kho, thống kê tổng đơn hàng trong hệ thống, thống kê tổng doanh thu bán hàng theo từng tháng của năm.


# Usecase tổng quát

![ảnh](https://github.com/1119-DuyNguyen/coffe_lar/assets/62139508/62b15271-8052-407b-8c84-a3a7b52d9ac8)

# Database
![ảnh](https://github.com/1119-DuyNguyen/coffe_lar/assets/62139508/61577f6b-b5ce-44cb-82da-d55462d0d132)

# Demo chức năng đặt mua hàng : 


### Activity
![ảnh](https://github.com/1119-DuyNguyen/coffe_lar/assets/62139508/a1ebd202-ce01-4f1c-8573-19ecbc023f10)
### Sequence
![ảnh](https://github.com/1119-DuyNguyen/coffe_lar/assets/62139508/48bf02f6-d08b-4ad9-9dd1-262cc96bebf5)

### Giao diện

![ảnh](https://github.com/1119-DuyNguyen/coffe_lar/assets/62139508/8183e1dd-38e8-4703-b84d-4656144312ae)

**Bảng mô tả thành phần:**

|STT|Tên|Kiểu|Ý Nghĩa|Miền giá trị|Giá trị mặc định|Ghi chú|
|---|---|---|---|---|---|---|
|1|NameUserInputForm|InputTextForm|Cho phép người dùng nhập tên người dùng|Text|||
|2|UserNumberInputForm|InputTextForm|Cho phép người dùng nhập số điện thoại|Text|||
|3|UserEmailInputForm|InputTextForm|Cho phép người dùng nhập email|Text|||
|4|UserNoteInputForm|InputTextForm|Cho phép người dùng nhập ghi chú|Text|||
|5|SelectProvince|Select|Cho phép người dùng chọn Tỉnh/Thành nhận hàng||||
|6|SelectCounty|Select|Cho phép người dùng chọn Quận/Huyện nhận hàng||Bỏ trống nếu chưa chọn tỉnh/thành||
|7|SelectWards|Select|Cho phép người dùng chọn Phường/Xã nhận hàng||Bỏ trống nếu chưa chọn Quận/Huyện||
|8|UserDetailInputForm|InputTextForm|Cho phép người dùng nhập địa chỉ chi tiết để nhận hàng|Text|||
|9|UserPaymentButton|InputRadioboxtForm|Cho phép người dùng chọn phương thức thanh toán||||
|10|TotalProduct|Text|Cho phép người dùng theo dõi tổng số tiền cần thanh toán cho đơn hàng||||
|11|AbateButton|Button|Cho phép người sử dụng đặt hàng||||

**Danh sách các biến cố**

|STT|Điều kiện kích hoạt|Xử lý liên quan|Ghi chú|
|---|---|---|---|
|1|Người dùng nhập thông tin cần thiết và ấn nút “thanh toán”|Hệ thống kiểm tra thông tin người dùng và hiện thị ra lỗi nếu có, sau đó thực hiện khởi tạo đơn hàng||
|2|Người dùng chọn giá trị ở trong thanh “tỉnh/thành phố”|Hệ thống kiểm tra và hiển thị và load dữ liệu “quận"||
|3|Người dùng chọn giá trị ở trong thanh “quận”|Hệ thống kiểm tra và hiển thị và load dữ liệu “phường/ xã"||
|4|Người dùng chọn giá trị ở trong  thanh “phường/xã”|Hệ thống kiểm tra và cập nhập giá tiền ship cho đơn hàng||
