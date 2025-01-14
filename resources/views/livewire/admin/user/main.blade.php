<!-- Main Section -->
<main class="flex-1 overflow-y-auto p-6">
    <h1 class="text-center font-bold text-2xl mb-6">Quản lý người dùng</h1>

    <!-- Button Tạo Người Dùng Mới -->
    <div class="mb-4 text-left">
        <button wire:click="openModal" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700">
            Tạo người dùng mới
        </button>
    </div>

    <!-- Bảng Quản Lý Người Dùng -->
    <div class="overflow-x-auto">
        <table class="table-auto w-full border-collapse border border-gray-300">
            <thead class="bg-gray-100">
                <tr>
                    <th class="border border-gray-300 px-4 py-2">ID</th>
                    <th class="border border-gray-300 px-4 py-2">Tên</th>
                    <th class="border border-gray-300 px-4 py-2">Email</th>
                    <th class="border border-gray-300 px-4 py-2">Email Đã Xác Minh</th>
                    <th class="border border-gray-300 px-4 py-2">Mật khẩu</th>
                    <th class="border border-gray-300 px-4 py-2">Ngày tạo</th>
                    <th class="border border-gray-300 px-4 py-2">Ngày cập nhật</th>
                    <th class="border border-gray-300 px-4 py-2">Hành động</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr class="hover:bg-gray-100">
                        <td class="border border-gray-300 px-4 py-2 text-center">{{ $user->id }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $user->name }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $user->email }}</td>
                        <td class="border border-gray-300 px-4 py-2 text-center">
                            {{ $user->email_verified_at ? '✔' : '✘' }}
                        </td>
                        <td class="border border-gray-300 px-4 py-2">{{ $user->password }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $user->created_at }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $user->updated_at }}</td>
                        <td class="border border-gray-300 px-4 py-2 flex justify-center space-x-2">
                            <button wire:click="editUser({{ $user->id }})"
                                class="bg-yellow-500 text-white px-3 py-1 rounded-md hover:bg-yellow-600">Sửa</button>
                            <button wire:click="openConfirmModal({{ $user->id }})"
                                class="bg-red-600 text-white px-3 py-1 rounded-md hover:bg-red-700">Xoá</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- modal -->
    <div x-data="{ open: @entangle('isModalOpen') }" x-show="open"
        class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50">
        <div class="bg-white rounded-lg shadow-lg p-6 w-1/3">
            <h2 class="text-xl font-bold mb-4">
                {{ $isEditMode ? 'Cập nhật người dùng' : 'Tạo người dùng mới' }}
            </h2>

            <!-- Form -->
            <form wire:submit.prevent="{{ $isEditMode ? 'updateUser' : 'createUser' }}">
                <div class="mb-4">
                    <label for="name" class="block font-semibold">Tên</label>
                    <input type="text" id="name" wire:model.defer="name"
                        class="w-full border border-gray-300 rounded-md px-3 py-2">
                    @error('name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>
                <div class="mb-4">
                    <label for="email" class="block font-semibold">Email</label>
                    <input type="email" id="email" wire:model.defer="email"
                        class="w-full border border-gray-300 rounded-md px-3 py-2">
                    @error('email') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>
                @if (!$isEditMode)
                    <div class="mb-4">
                        <label for="password" class="block font-semibold">Mật khẩu</label>
                        <input type="password" id="password" wire:model.defer="password"
                            class="w-full border border-gray-300 rounded-md px-3 py-2">
                        @error('password') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>
                @endif
                <div class="flex justify-end space-x-2">
                    <button type="button" wire:click="closeModal"
                        class="bg-gray-500 text-white px-4 py-2 rounded-md hover:bg-gray-600">Huỷ</button>
                    <button type="submit"
                        class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700">Lưu</button>
                </div>
            </form>
        </div>
    </div>
    <!-- Modal Xác Nhận Xóa -->
    <div x-data="{ open: @entangle('isConfirmModalOpen') }" x-show="open"
        class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50">
        <div class="bg-white rounded-lg shadow-lg p-6 w-1/3">
            <h2 class="text-xl font-bold mb-4 text-center">Xác nhận xóa</h2>
            <p class="text-center mb-6">Bạn có chắc chắn muốn xóa người dùng này không? Thao tác này không thể hoàn tác.
            </p>
            <div class="flex justify-center space-x-4">
                <button type="button" wire:click="closeConfirmModal"
                    class="bg-gray-500 text-white px-4 py-2 rounded-md hover:bg-gray-600">Huỷ</button>
                <button type="button" wire:click="deleteUser"
                    class="bg-red-600 text-white px-4 py-2 rounded-md hover:bg-red-700">Xóa</button>
            </div>
        </div>
    </div>
</main>