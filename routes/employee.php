<?php

use App\Http\Controllers\Backend\Receipt\ReceiptController;
use App\Http\Controllers\Backend\User\EmployeeController;
use App\Http\Controllers\Backend\Opinion\TypeOpinionController;
use App\Http\Controllers\Backend\Contract\ContractController;
use App\Http\Controllers\Backend\Opinion\OpinionController;
use App\Http\Controllers\Backend\Checkin\CheckinController;


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\Provider\ProviderController;


Route::resource('employees', EmployeeController::class);

Route::resource('type-opinions', TypeOpinionController::class);

Route::resource('providers', ProviderController::class);

Route::resource('contracts', ContractController::class);

Route::put('opinions/change-status', [OpinionController::class, 'changeOpinionStatus'])->name('opinions.change-status');
Route::resource('opinions', OpinionController::class);


/** receipt */
Route::resource('receipts', ReceiptController::class);


Route::resource('checkins', CheckinController::class);

// Route::get('/', 'NhanVienController@getview');


// Route::get('danhsachnvpb', 'DanhmucController@getDanhSachNVPB')->middleware('check:qlnhanvienpb');;

// //--------------------------- Phòng ban ---------------------------
// Route::group(['prefix' => 'phongban', 'middleware' => 'check:phongban'], function () {
//     Route::get('danhsach', 'DanhmucController@getDanhSachPB');
//     //Route::get('danhsach', ['uses'=>'DanhmucController@getDanhSachPB', 'as'=>'danhsach.index']);
//     //---------------------Form Thêm phòng ban -----------------------------------
//     Route::get('them', 'PhongbanController@getThemPB');
//     Route::post('them', 'PhongBanController@postThemPB');

//     Route::get('sua/{id_phongban}', 'PhongBanController@getSuaPB');
//     Route::post('sua/{id_phongban}', 'PhongBanController@postSuaPB');

//     Route::get('xoa/{id_phongban}', 'PhongBanController@getXoaPB');
//     Route::get('bab', 'PhongBanController@tesT');
// });

// //--------------------------- Chức vụ ---------------------------
// Route::group(['prefix' => 'chucvu', 'middleware' => 'check:chucvu'], function () {
//     Route::get('danhsach', 'DanhmucController@getDanhSachCV');

//     Route::get('them', 'ChucVuController@getThemCV');
//     Route::post('them', 'ChucVuController@postThemCV');

//     Route::get('sua/{id_chucvu}', 'ChucVuController@getSuaCV');
//     Route::post('sua/{id_chucvu}', 'ChucVuController@postSuaCV');

//     Route::get('xoa/{id_chucvu}', 'ChucVuController@getXoaCV');
// });

// Route::group(['prefix' => 'phucap', 'middleware' => 'check:phucap'], function () {
//     Route::get('danhsach', 'DanhmucController@getDanhSachPC');
//     Route::get('sua/{id}', 'PhucapController@getSuaPC');
//     Route::post('sua/{id}', 'PhucapController@postSuaPC');
// });

// //--------------------------- Nhân Viên ---------------------------
// Route::group(['prefix' => 'nhanvien', 'middleware' => 'check:dsnhanvien'], function () {
//     Route::get('danhsach', 'DanhmucController@getDanhSachNV');
//     // //-------------------------- Chi tiết -----------------------------------
//     // Route::get('chitiet/{id}','DanhmucController@getHoSoFull');
//     Route::get('{num}', 'DanhmucController@getDanhSachNVLoai');

//     // Route::get('them','DanhmucController@getDanhSachCV');     //chua lam
//     // Route::post('them','DanhmucController@getDanhSachCV');     //chua lam

//     // Route::get('sua','PhongbanController@getFormPB');   //chua lam
//     // Route::post('sua','PhongbanController@addPhongBan');    //chua lam


// });

// //--------------------------- Hợp đồng ---------------------------
// Route::group(['prefix' => 'hopdong', 'middleware' => 'check:quanlyhopdong'], function () {
//     Route::get('danhsach', 'DanhmucController@getDanhSachHD');
//     Route::get('nhanvien/{id}', 'DanhmucController@getDanhSachHDNV');

//     Route::get('them', 'DanhmucController@getDanhSachCV');     //chua lam
//     Route::post('them', 'DanhmucController@getDanhSachCV');     //chua lam

//     Route::get('sua', 'PhongbanController@getFormPB');   //chua lam
//     Route::post('sua', 'PhongbanController@addPhongBan');    //chua lam
// });

// //--------------------------- Ý kiến ---------------------------
// Route::group(['prefix' => 'ykien'], function () {
//     Route::get('danhsach', 'DanhmucController@getDanhSachYK')->middleware('check:quanlyykien');      //Danh sách toàn bộ
//     Route::get('danhsach/loai/{id}', 'DanhmucController@getDanhSachYKL')->middleware('check:quanlyykien');    //Danh sách theo loại ý kiến
//     Route::get('danhsach/theodoi', 'YKienController@getDSYKCaNhan')->middleware('check:ykien');
//     Route::get('danhsach/chitiet/{id_luuykien}', 'YkienController@getChiTietYK')->middleware('check:ykien');     //Danh sách để người dùng theo dõi

//     Route::post('danhsach/{id}/{id_luuykien}', 'YKienController@postDuyetYK')->middleware('check:quanlyykien');       //Duyệt ý kiến

//     Route::get('them', 'YKienController@getThemYK')->middleware('check:ykien');         //thêm
//     Route::post('them', 'YKienController@postThemYK')->middleware('check:ykien');       //thêm

//     Route::get('sua/{id_luuykien}', 'YKienController@getSuaYK')->middleware('check:ykien');     //sửa
//     Route::post('sua/{id_luuykien}', 'YKienController@postSuaYK')->middleware('check:ykien');   //sửa

//     Route::get('xoa/{id_luuykien}', 'YKienController@getXoaYK')->middleware('check:ykien');     //xóa
// });

// //--------------------------- Loại ý kiến ---------------------------
// Route::group(['prefix' => 'loaiykien', 'middleware' => 'check:quanlyloaiykien'], function () {
//     Route::get('danhsach', 'DanhmucController@getDanhSachLoaiYK');

//     Route::get('them', 'LoaiYKienController@getThemLoaiYK');
//     Route::post('them', 'LoaiYKienController@postThemLoaiYK');

//     Route::get('sua/{id_ykien}', 'LoaiYKienController@getSuaLoaiYK');
//     Route::post('sua/{id_ykien}', 'LoaiYKienController@postSuaLoaiYK');

//     Route::get('xoa/{id_ykien}', 'LoaiYKienController@getXoaLoaiYK');
// });

// //--------------------------- Chấm Công ---------------------------
// Route::group(['prefix' => 'chamcong'], function () {
//     Route::get('/', 'ChamCongController@getChamCong');
//     Route::post('checkin', 'ChamCongController@checkin')->name('checkin');
//     Route::post('checkout', 'ChamCongController@checkout')->name('checkout');

//     Route::get('danhsach', 'DanhMucController@getDanhSachChamCong');

//     Route::get('tangca', 'ChamCongController@getTangCa')->name('tangca');
//     Route::get('tangca/chitiet/{id_tangca}', 'ChamCongController@getChiTietTangCa');

//     Route::post('checkin_tangca', 'ChamCongController@checkinTangCa')->name('checkin_tangca');
//     Route::post('checkout_tangca', 'ChamCongController@checkoutTangCa')->name('checkout_tangca');
// });

// //--------------------------- thưởng --------------------------- 19.8
// Route::group(['prefix' => 'thuong'], function () {
//     Route::get('danhsach', 'DanhMucController@getDanhSachThuongAll');
//     Route::get('canhan', 'DanhMucController@getDanhSachThuong');
// });
// //--------------------------- kỷ luật ---------------------------
// Route::group(['prefix' => 'kyluat'], function () {
//     Route::get('danhsach', 'DanhMucController@getDanhSachKyLuatAll');
//     Route::get('canhan/{id_nhanvien}', 'DanhMucController@getDanhSachKyLuat');
// });

// Route::group(['prefix' => 'baohiem'], function () {
//     Route::get('danhsach', 'DanhMucController@getDanhSachBaoHiem');
//     Route::get('chitiet/{id_baohiem}', 'BaoHiemController@getChiTietBH');

//     Route::get('them/{id_nhanvien}', 'BaoHiemController@getThemBH');
//     Route::post('them/{id_nhanvien}', 'BaoHiemController@postThemBH');

//     Route::get('sua/{id_baohiem}', 'BaoHiemController@getSuaBH');
//     Route::post('sua/{id_baohiem}', 'BaoHiemController@postSuaBH');

//     Route::get('xoa/{id_baohiem}', 'BaoHiemController@postXoaBH');
// });
// //--------------------------------17.7--------------------------------
// Route::group(['prefix' => 'luong', 'middleware' => 'check:quanlyluong'], function () {

//     Route::get('danhsach', 'DanhmucController@getDanhSachLuong');

//     Route::post('update', 'LuongController@updateLuongAll')->name('update');
// });
// Route::get('luong', 'LuongController@getLuong');
// Route::get('luong/chitiet/{id_bangluong}', 'LuongController@chiTietLuong');

// //-------------------------- Chi tiết -----------------------------------
// // Route::get('nhanvien/{num}','DanhmucController@getDanhSachNVLoai');
// // Route::get('hoso/{id}','DanhmucController@getHoSoFull');
// // Route::get('checkkk/{id}','DanhmucController@getHopDongNhanVien');

// //------------------------- Nhân Viên -----------------------------

// Route::get('quanly/thongtin/{id}', 'QLNhansuController@getHoSoNhanVien')->middleware('check:thongtinnhanvien'); //Lấy thông tin hồ sơ sử dụng cho xem thông tin cá nhân
// Route::get('quanly/suathongtin/{id}', 'QLNhansuController@getSuaHoSoNhanVien')->middleware('check:thongtinnhanvien');
// Route::post('quanly/suathongtin/{id}', 'QLNhansuController@postSuaHoSoNhanVien')->middleware('check:thongtinnhanvien');
// Route::get('quanly/xoathongtin/{id}', 'QLNhansuController@getXoaNhanvien')->middleware('check:thongtinnhanvien');


// Route::get('thongtincanhan', 'NhanVienController@getHoSoNhanVien');
// Route::post('thongtintaikhoan', 'NhanVienController@postThongtinTaikhoan');


// Route::get('{id}/hopdong', 'NhanVienController@getHopDongNhanVien')->middleware('check:hopdongcanhan');
// // Route::get('{id}/giadinh','NhanvienController@getGiaDinh');
// // Route::get('{id}/baohiem','NhanvienController@getBaoHiem');
// /*Route::get('{id}/luong-thue','');
// Route::get('{id}/chamcong','');
// Route::get('{id}/congviec','');
// Route::get('{id}/ykien','');*/


// //-------------------------- Quản lý nhân sự ----------------------------------
// Route::get('laphoso', 'QLNhansuController@getThemnhanvien')->middleware('check:laphoso');
// Route::post('laphoso', 'QLNhansuController@postThemnhanvien')->middleware('check:laphoso');
// Route::get('laphoso', 'QLNhansuController@getThemnhanvien')->middleware('check:laphoso');
// Route::post('laphoso', 'QLNhansuController@postThemnhanvien')->middleware('check:laphoso');
// Route::get('laphopdong/{id}', 'QLNhansuController@getLaphopdong')->middleware('check:laphopdong');
// Route::post('laphopdong/{id}', 'QLNhansuController@postLaphopdong')->middleware('check:laphopdong');
// Route::get('laphopdong/pdf/{id}', 'QLNhansuController@getPDFhopdong')->middleware('check:laphopdong');
// Route::get('chitiethopdong/{id}', 'QLNhansuController@getChitiethopdong')->middleware('check:laphopdong');


// Route::get('phuluc/{id}', 'QLNhansuController@getPhulucNV')->middleware('check:lapphuluc');
// Route::get('chitietphuluc/{idhopdong}/{idphuluc}', 'QLNhansuController@getchitietPhulucNV')->middleware('check:lapphuluc');
// Route::get('lapphuluc/{id}', 'QLNhansuController@getlapPhulucNV')->middleware('check:lapphuluc');
// Route::post('lapphuluc/{id}', 'QLNhansuController@postlapPhulucNV')->middleware('check:lapphuluc');
// Route::get('lapphuluc/pdf/{id}', 'QLNhansuController@getPDFphuluc')->middleware('check:lapphuluc');

// Route::get('danhsachquyetdinh', 'QLNhansuController@getDSquyetdinh')->middleware('check:lapquyetdinh');
// // Route::get('quyetdinhthoiviec','QLNhansuController@getThoiviec')->middleware('check:lapquyetdinh');
// Route::get('quyetdinhthoiviecNV/{id}', 'QLNhansuController@getThoiviecNv')->middleware('check:lapquyetdinh');
// Route::post('quyetdinhthoiviecNV/{id}', 'QLNhansuController@postThoiviecNv')->middleware('check:lapquyetdinh');
// Route::post('upanhkyluat/{id}', 'QLNhansuController@postAnhkyluat')->middleware('check:lapquyetdinh');
// Route::get('quyetdinh/{id}', 'QLNhansuController@getquyetdinh')->middleware('check:lapquyetdinh');
// Route::get('chitietquyetdinh/{id}', 'QLNhansuController@getquyetdinhnv')->middleware('check:lapquyetdinh');
// Route::get('quyetdinh/pdf/{id}', 'QLNhansuController@getPDFquyetdinh')->middleware('check:lapquyetdinh');
// Route::get('nghiviec/pdf/{id}', 'QLNhansuController@getPDFnghiviec')->middleware('check:lapquyetdinh');
// Route::get('huyquyetdinh/{id}', 'QLNhansuController@huyquyetdinh')->middleware('check:lapquyetdinh');


// //----------------------Form thêm nhân viên -------------------------
// Route::group(['prefix' => 'ajax'], function () {
//     Route::get('chucvu/{id_phongban}', 'AjaxController@getChucvu');


//     Route::get('chucvu_moi/{id_phongban_moi}', 'AjaxController@getChucvumoi');

//     Route::get('phucap_moi/{id_chucvu_moi}', 'AjaxController@getPhucapmoi');
//     Route::get('nhanvien_ykien/{id_chucvu}', 'AjaxController@getNhanvienykien');
// });
