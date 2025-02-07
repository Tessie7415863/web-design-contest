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
        $permissions = [
            'create-user',
            'edit-user',
            'delete-user',
            'manage-document',
            'borrow-document',
            'view-document',
            'suggest-document',
            'access-admin'
        ];

        foreach ($permissions as $perm) {
            Permission::findOrCreate($perm);
        }

        // Tạo vai trò (roles)
        $roles = [
            'admin' => ['create-user', 'edit-user', 'delete-user', 'manage-document', 'borrow-document', 'view-document', 'suggest-document', 'access-admin'],
            'librarian' => ['manage-document', 'borrow-document', 'view-document', 'access-admin'],
            'teacher' => ['borrow-document', 'view-document', 'suggest-document'],
            'student' => ['borrow-document', 'view-document']
        ];

        foreach ($roles as $role => $perms) {
            $roleInstance = Role::findOrCreate($role);
            $roleInstance->givePermissionTo($perms);
        }

        // Tạo tài khoản mẫu
        $users = [
            ['name' => 'Quân', 'email' => 'vquan.dev@gmail.com', 'password' => 'vanquan2509', 'role' => 'admin'],
            ['name' => 'Hoàng', 'email' => 'nguyenvanhoang130820@gmail.com', 'password' => 'vanhoang123', 'role' => 'admin'],
            ['name' => 'Librarian User', 'email' => 'librarian@example.com', 'password' => 'password', 'role' => 'librarian'],
            ['name' => 'Teacher User', 'email' => 'teacher@example.com', 'password' => 'password', 'role' => 'teacher'],
            ['name' => 'Student User', 'email' => 'student@example.com', 'password' => 'password', 'role' => 'student']
        ];

        foreach ($users as $userData) {
            $user = User::create([
                'name' => $userData['name'],
                'email' => $userData['email'],
                'password' => bcrypt($userData['password'])
            ]);
            $user->assignRole($userData['role']);
        }
    }
}
