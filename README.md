# Yêu cầu hệ thống

Người dùng khách:
-	Tìm kiếm sản phẩm
-	Đăng nhập/ Đăng kí
Người dùng: 
-	Quản lý giỏ hàng
-	Quản lý thông tin tài khoản
-	Xem lịch sử mua hàng
-	Đặt hàng

người quản lý nhân sự:
-	Thống kê
- Thêm/xóa nhân sự trong doanh nghiệp.
- Thay đổi chức vụ của nhân sự, lưu ý, khi thay đổi chức vụ phải có thời điểm cụ thể
và lương sẽ thay đổi theo
- Tính lương cho mỗi nhân sự, theo quy định của doanh nghiệp
- Duyệt nhân sự nghỉ việc, nghỉ phép…
- Thống kê theo tháng, năm tình hình nhân sự lương, thưởng nhân sự
nhân viên:
- Nhân viên có thể xem, sửa thông tin của chính mình.
- Nhân viên có thể nộp đơn xin nghỉ phép, nghỉ ốm đau thai sản, nghỉ việc.
- Xem được cách tính lương, lương mỗi tháng của chính mình.
- In được bảng lương theo tháng
- In được bảng lương theo năm
Quản lý kho

-	Quản lý danh mục
-	Xử lí đơn hàng
- Quản lý thông tin về sản phẩm doanh nghiệp đang kinh doanh, giá cả, chi tiết số
lượng tồn của mỗi sản phẩm giá nhập vào
- Thêm/ xoá/ sửa thông tin sản phẩm.
- Lập phiếu nhập sản phẩm vào doanh nghiệp.
- Thêm, sửa, xoá, tìm kiếm thông tin nhà cung cấp
- In báo cáo thống kê theo tháng, năm về sản phẩm
 Quản lý kinh doanh
- Lập được phiếu xuất sản phẩm cho hoạt động kinh doanh: số lượng bán, giá bán.
- Thống kê số lượng sản phẩm đã xuất theo tháng, quý, năm.
- Thống kê được lợi nhuận của doanh nghiệp theo tháng, quý, năm

# BFD Bảng phân rã chức năng

![image](https://github.com/1119-DuyNguyen/coffe_lar/assets/62139508/63e11e1a-0bf2-4586-bbf6-21c77d2d67ff)

# Sơ đồ Usecase tổng quan của hệ thống cửa hàng cà phê (chưa update)
![ảnh](https://github.com/1119-DuyNguyen/coffe_lar/assets/62139508/90be87ae-40cc-4ceb-9a0f-1d26f67a69b8)



| # | Actor | Định nghĩa |
| ---- | ---- | ---- |
| 1 | NguoiDungKhach | Là người hứng thú và tìm kiếm các mặt hàng phù hợp với nhu cầu |
| 2 | NguoiDung | Người dùng là người dùng khách khi đã tìm thấy mặt hàng phù hợp sẽ đăng nhập để có thể thanh toán |
| 3 | NhanVien | Là người xử lý đơn hàng và tuỳ vào cấp bậc có thể làm các chức năng như thống kê, quản lý tài nguyên của hệ thống, xử lý đơn hàng, tạo các tài khoản với vai trò mang các quyền nhất định |

# Database

![image](https://github.com/1119-DuyNguyen/coffe_lar/assets/62139508/dd7bd0e6-ce71-4e38-b04d-8a68de9de8bd)


# Demo chức năng đặt mua hàng : 


### Activity
![ảnh](https://github.com/1119-DuyNguyen/coffe_lar/assets/62139508/a1ebd202-ce01-4f1c-8573-19ecbc023f10)
### Sequence

![DatHang](https://github.com/1119-DuyNguyen/coffe_lar/assets/62139508/57c7b762-7bde-4974-8d0a-5028d3d57761)

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
|11|SubmitButton|Button|Cho phép người sử dụng đặt hàng||||

**Danh sách các biến cố**

|STT|Điều kiện kích hoạt|Xử lý liên quan|Ghi chú|
|---|---|---|---|
|1|Người dùng nhập thông tin cần thiết và ấn nút “thanh toán”|Hệ thống kiểm tra thông tin người dùng và hiện thị ra lỗi nếu có, sau đó thực hiện khởi tạo đơn hàng||
|2|Người dùng chọn giá trị ở trong thanh “tỉnh/thành phố”|Hệ thống kiểm tra và hiển thị và load dữ liệu “quận"||
|3|Người dùng chọn giá trị ở trong thanh “quận”|Hệ thống kiểm tra và hiển thị và load dữ liệu “phường/ xã"||
|4|Người dùng chọn giá trị ở trong  thanh “phường/xã”|Hệ thống kiểm tra và cập nhập giá tiền ship cho đơn hàng||

# Thử nghiệm và đánh giá các chức năng 
