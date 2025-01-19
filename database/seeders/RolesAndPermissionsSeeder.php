<?php

namespace Database\Seeders;

use App\Models\SinhVien;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    public function run()
    {
        // Tạo quyền (permissions)
        $createUserPermission = Permission::create(['name' => 'create-user']);
        $editUserPermission = Permission::create(['name' => 'edit-user']);
        $deleteUserPermission = Permission::create(['name' => 'delete-user']);
        $manageDocumentPermission = Permission::create(['name' => 'manage-document']);
        $borrowDocumentPermission = Permission::create(['name' => 'borrow-document']);
        $viewDocumentPermission = Permission::create(['name' => 'view-document']);
        $suggestDocumentPermission = Permission::create(['name' => 'suggest-document']);

        // Tạo vai trò (roles)
        $adminRole = Role::create(['name' => 'admin']);
        $librarianRole = Role::create(['name' => 'librarian']);
        $teacherRole = Role::create(['name' => 'teacher']);
        $studentRole = Role::create(['name' => 'student']);

        // Gán quyền cho vai trò
        $adminRole->givePermissionTo(
            $createUserPermission,
            $editUserPermission,
            $deleteUserPermission,
            $manageDocumentPermission,
            $borrowDocumentPermission,
            $viewDocumentPermission,
            $suggestDocumentPermission
        );

        $librarianRole->givePermissionTo(
            $manageDocumentPermission,
            $borrowDocumentPermission,
            $viewDocumentPermission
        );

        $teacherRole->givePermissionTo(
            $borrowDocumentPermission,
            $viewDocumentPermission,
            $suggestDocumentPermission
        );

        $studentRole->givePermissionTo($borrowDocumentPermission, $viewDocumentPermission);

        // Tạo người dùng mẫu và gán vai trò
        $user = User::create([
            'name' => 'QUÂN',
            'email' => 'vquan.dev@gmail.com',
            'password' => bcrypt('vanquan2509')
        ]);
        $user->assignRole('admin');
        // $sinhvien = SinhVien::create([
        //     'ho_ten' => 'QUÂN',
        //     'user_id' => '1',
        //     'ngay_sinh' => '2000-01-01',
        //     'gioi_tinh' => 'Nam',
        //     'lop' => 'CNTT10',
        //     'email' => 'vquan.dev@gmail.com',
        //     'password' => bcrypt('vanquan2509'),
        //     'tai_khoan' => 'vquan',
        //     'dia_chi' => 'test'
        // ]);
        // $sinhvien->assignRole('admin');
        // $user->assignRole('admin');
        $permission = Permission::findOrCreate('access-admin');

        $user = User::create([
            'name' => 'Hoàng',
            'email' => 'nguyenvanhoang130820@gmail.com',
            'password' => bcrypt('vanhoang123')
        ]);
        $user->assignRole('admin');
        $permission = Permission::findOrCreate('access-admin');
        // Gán quyền cho user
        $user->givePermissionTo($permission);
    }


}