<?php

use App\Livewire\Admin\AdminLayout;
use App\Livewire\Admin\Bophan\ManageBophan;
use App\Livewire\Admin\Khoa\ManageKhoa;
use App\Livewire\Admin\Loaitailieu\ManageLoaitailieu;
use App\Livewire\Admin\Monhoc\ManageMonhoc;
use App\Livewire\Admin\Nganh\ManageNganh;
use App\Livewire\Admin\Nhanvien\ManageNhanvien;
use App\Livewire\Admin\Nhaxuatban\ManageNhaxuatban;
use App\Livewire\Admin\Permissions\ManagePermissions;
use App\Livewire\Admin\Rolehaspermission\ManageRolehaspermission;
use App\Livewire\Admin\Roles\ManageRoles;
use App\Livewire\Admin\Sach\ManageSach;
use App\Livewire\Admin\Sinhvien\ManageSinhvien;
use App\Livewire\Admin\Tacgia\ManageTacgia;
use App\Livewire\Admin\Theloai\ManageTheloai;
use App\Livewire\Admin\User\ManageUser;
use App\Livewire\Auth\Forgot;
use App\Livewire\Auth\Login;
use App\Livewire\Auth\Register;
use App\Livewire\Auth\ResetPassword;
use App\Livewire\Client\HomePage;
use Illuminate\Support\Facades\Route;


// Trang chính
Route::middleware('web')->group(function () {
    Route::get('/', HomePage::class);
    Route::get('/register', Register::class)->name('register');
    Route::get('/login', Login::class)->name('login');
    Route::get('/forgot', action: Forgot::class)->name('password.request');
    Route::get('/reset/{token}', action: ResetPassword::class)->name('password.reset');
});

// Đảm bảo yêu cầu người dùng phải đăng nhập và có quyền admin
Route::middleware(['auth', 'can:access-admin'])->group(function () {
    Route::get('/logout', function () {
        auth()->logout();
        return redirect('/login');
    });
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
    Route::get('/admin/manage-vitrisach', ManageViTriSach::class)->name('admin.manage-vitrisach');
});