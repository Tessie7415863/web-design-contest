<?php

use App\Livewire\Admin\AdminLayout;
use App\Livewire\Admin\Booksubject\ManageBooksubject;
use App\Livewire\Admin\Bophan\ManageBophan;
use App\Livewire\Admin\Cuonsach\ManageCuonsach;
use App\Livewire\Admin\Datsach\ManageDatsach;
use App\Livewire\Admin\Digitalresourcemajor\ManageDigitalresourcemajor;
use App\Livewire\Admin\Digitalresourcesubject\ManageDigitalresourcesubject;
use App\Livewire\Admin\Failedjob\ManageFailedjob;
use App\Livewire\Admin\Hoadonphat\ManageHoadonphat;
use App\Livewire\Admin\Khoa\ManageKhoa;
use App\Livewire\Admin\Lienketsachnganh\ManageLienketsachnganh;
use App\Livewire\Admin\Loaitailieu\ManageLoaitailieu;
use App\Livewire\Admin\Monhoc\ManageMonhoc;
use App\Livewire\Admin\Nganh\ManageNganh;
use App\Livewire\Admin\Nhanvien\ManageNhanvien;
use App\Livewire\Admin\Nhaxuatban\ManageNhaxuatban;
use App\Livewire\Admin\Permissions\ManagePermissions;
use App\Livewire\Admin\Phat\ManagePhat;
use App\Livewire\Admin\Phieumuon\ManagePhieumuon;
use App\Livewire\Admin\Phieutra\ManagePhieutra;
use App\Livewire\Admin\Rolehaspermission\ManageRolehaspermission;
use App\Livewire\Admin\Roles\ManageRoles;
use App\Livewire\Admin\Sach\ManageSach;
use App\Livewire\Admin\Sinhvien\ManageSinhvien;
use App\Livewire\Admin\Tacgia\ManageTacgia;
use App\Livewire\Admin\Tailieumo\ManageTailieumo;
use App\Livewire\Admin\Theloai\ManageTheloai;
use App\Livewire\Admin\User\ManageUser;
use App\Livewire\Admin\Vitrisach\ManageViTriSach;
use App\Livewire\Auth\Forgot;
use App\Livewire\Auth\Login;
use App\Livewire\Auth\Register;
use App\Livewire\Auth\ResetPassword;
use App\Livewire\Auth\SinhvienLogin;
use App\Livewire\Auth\SinhvienRegister;
use App\Livewire\Client\Components\Borrow;
use App\Livewire\Client\Components\Sach;
use App\Livewire\Client\HomePage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


// Trang chính
Route::middleware('web')->group(function () {
    Route::get('/', HomePage::class);
    Route::get('sach', Sach::class)->name('sach');
    Route::get('borrow/{id}', Borrow::class)->name('borrow');
    //sinhvien
    Route::get('/register', SinhvienRegister::class)->name('register');
    Route::get('/login', SinhvienLogin::class)->name('login');
    Route::get('/forgot', action: Forgot::class)->name('password.request');
    Route::get('/reset/{token}', action: ResetPassword::class)->name('password.reset');
    //admin
    Route::get('/admin/login', Login::class)->name('login');
    Route::get('/admin/register', Register::class)->name('register');
});
// Sinh viên logout
Route::get('/logout', function () {
    Auth::guard('sinhvien')->logout();
    session()->invalidate(); // Xóa session
    session()->regenerateToken(); // Tạo token mới để tránh CSRF attack
    return redirect('/login');
})->name('sinhvien.logout');

// Admin logout
Route::get('/admin/logout', function () {
    Auth::guard('web')->logout();
    session()->invalidate();
    session()->regenerateToken();
    return redirect('/admin/login');
})->name('admin.logout');

Route::middleware(['auth', 'can:manage-users'])->group(function () {
    Route::get('/admin/manage-user', ManageUser::class)->name('admin.manage-user');
});

Route::middleware(['auth', 'can:manage-sinhvien'])->group(function () {
    Route::get('/admin/manage-sinhvien', ManageSinhvien::class)->name('admin.manage-sinhvien');
});

// Đảm bảo yêu cầu người dùng phải đăng nhập và có quyền admin
Route::middleware(['auth', 'can:access-admin'])->group(function () {
    Route::get('/admin', AdminLayout::class);
    Route::get('/admin/manage-user', ManageUser::class)->name('admin.manage-user');
    Route::get('/admin/manage-sinhvien', ManageSinhvien::class)->name('admin.manage-sinhvien');
    Route::get('/admin/manage-permissions', ManagePermissions::class)->name('admin.manage-permisstions');
    Route::get('/admin/manage-roles', ManageRoles::class)->name('admin.manage-roles');
    Route::get('/admin/manage-rolehaspermission', ManageRolehaspermission::class)->name('admin.manage-rolehaspermission');
    Route::get('/admin/manage-khoa', ManageKhoa::class)->name('admin.manage-khoa');
    Route::get('/admin/manage-nganh', ManageNganh::class)->name('admin.manage-nganh');
    Route::get('/admin/manage-loaitailieu', ManageLoaitailieu::class)->name('admin.manage-loaitailieu');
    Route::get('/admin/manage-nhaxuatban', ManageNhaxuatban::class)->name('admin.manage-nhaxuatban');
    Route::get('/admin/manage-bophan', ManageBophan::class)->name('admin.manage-bophan');
    Route::get('/admin/manage-nhanvien', ManageNhanvien::class)->name('admin.manage-nhanvien');
    Route::get('/admin/manage-tacgia', ManageTacgia::class)->name('admin.manage-tacgia');
    Route::get('/admin/manage-theloai', ManageTheloai::class)->name('admin.manage-theloai');
    Route::get('/admin/manage-monhoc', ManageMonhoc::class)->name('admin.manage-monhoc');
    Route::get('/admin/manage-sach', ManageSach::class)->name('admin.manage-sach');
    Route::get('/admin/manage-cuonsach', ManageCuonsach::class)->name('admin.manage-cuonsach');
    Route::get('/admin/manage-datsach', ManageDatsach::class)->name('admin.manage-datsach');
    Route::get('/admin/manage-lienketsachnganh', ManageLienketsachnganh::class)->name('admin.manage-lienketsachnganh');
    Route::get('/admin/manage-tailieumo', ManageTailieumo::class)->name('admin.manage-tailieumo');
    Route::get('/admin/manage-booksubject', ManageBooksubject::class)->name('admin.manage-booksubject');
    Route::get('/admin/manage-phieumuon', ManagePhieumuon::class)->name('admin.manage-phieumuon');
    Route::get('/admin/manage-phieutra', ManagePhieutra::class)->name('admin.manage-phieutra');
    Route::get('/admin/manage-vitrisach', ManageViTriSach::class)->name('admin.manage-vitrisach');
    Route::get('/admin/manage-digitalresourcemajor', ManageDigitalresourcemajor::class)->name('admin.manage-digitalresourcemajor');
    Route::get('/admin/manage-digitalresourcesubject', ManageDigitalresourcesubject::class)->name('admin.manage-digitalresourcesubject');
    Route::get('/admin/manage-hoadonphat', ManageHoadonphat::class)->name('admin.manage-hoadonphat');
    Route::get('/admin/manage-phat', ManagePhat::class)->name('admin.manage-phat');
});
