<?php

use App\Livewire\Admin\AdminLayout;
use App\Livewire\Admin\Permissions\ManagePermissions;
use App\Livewire\Admin\Rolehaspermission\ManageRolehaspermission;
use App\Livewire\Admin\Roles\ManageRoles;
use App\Livewire\Admin\Sinhvien\ManageSinhvien;
use App\Livewire\Admin\User\ManageUser;
use App\Livewire\Auth\Login;
use App\Livewire\Auth\Register;
use App\Livewire\Client\HomePage;
use Illuminate\Support\Facades\Route;


// Trang chính
Route::get('/', HomePage::class);
Route::get('/register', Register::class)->name('register');
Route::get('/login', Login::class)->name('login');
// Đảm bảo yêu cầu người dùng phải đăng nhập và có quyền admin
Route::middleware(['auth', 'can:access-admin'])->group(function () {
    Route::get('/admin', AdminLayout::class);
    Route::get('/admin/manage-user', ManageUser::class)->name('admin.manage-user');
    Route::get('/admin/manage-sinhvien', ManageSinhvien::class)->name('admin.manage-sinhvien');
    Route::get('/admin/manage-permissions', ManagePermissions::class)->name('admin.manage-permisstions');
    Route::get('/admin/manage-roles', ManageRoles::class)->name('admin.manage-roles');
    Route::get('/admin/manage-rolehaspermission', ManageRolehaspermission::class)->name('admin.manage-rolehaspermission');
});