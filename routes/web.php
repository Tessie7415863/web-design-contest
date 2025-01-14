<?php

use App\Livewire\Admin\AdminLayout;
use App\Livewire\Admin\User\ManageUser;
use App\Livewire\Client\HomePage;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', HomePage::class);
Route::get('/admin', AdminLayout::class);
Route::get('/admin/manage-user', ManageUser::class)->name('admin.manage-user');