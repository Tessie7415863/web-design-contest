<div class="main">
    @livewire('client.components.header')
    <div class="max-w-4xl mx-auto p-6 bg-white shadow-lg rounded-lg mt-32">
        <h2 class="text-2xl font-semibold text-gray-800 mb-4">Trang cá nhân</h2>
        <form wire:submit.prevent="updateProfile" class="space-y-4">
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="text-gray-700">Họ tên:</label>
                    <input type="text" wire:model="ho_ten" class="w-full border-gray-300 rounded-lg p-2">
                </div>

                <div>
                    <label class="text-gray-700">Ngày sinh:</label>
                    <input type="date" wire:model="ngay_sinh" class="w-full border-gray-300 rounded-lg p-2">
                </div>
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="text-gray-700">Giới tính:</label>
                    <select wire:model="gioi_tinh" class="w-full border-gray-300 rounded-lg p-2">
                        <option value="Nam">Nam</option>
                        <option value="Nu">Nữ</option>
                        <option value="Khac">Khác</option>
                    </select>
                </div>

                <div>
                    <label class="text-gray-700">Lớp:</label>
                    <input type="text" wire:model="lop" class="w-full border-gray-300 rounded-lg p-2">
                </div>
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="text-gray-700">Email:</label>
                    <input type="email" wire:model="email" class="w-full border-gray-300 rounded-lg p-2">
                </div>

                <div>
                    <label class="text-gray-700">Số điện thoại:</label>
                    <input type="text" wire:model="sdt" class="w-full border-gray-300 rounded-lg p-2">
                </div>
            </div>

            <div>
                <label class="text-gray-700">Địa chỉ:</label>
                <input type="text" wire:model="dia_chi" class="w-full border-gray-300 rounded-lg p-2">
            </div>

            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">
                Cập nhật thông tin
            </button>
        </form>

        <!-- Đổi mật khẩu -->
        <h3 class="text-xl font-semibold text-gray-800 mt-6">Đổi mật khẩu</h3>

        <form wire:submit.prevent="updatePassword" class="space-y-4">
            <div>
                <label class="text-gray-700">Mật khẩu mới:</label>
                <input type="password" wire:model="new_password" class="w-full border-gray-300 rounded-lg p-2">
            </div>

            <div>
                <label class="text-gray-700">Xác nhận mật khẩu:</label>
                <input type="password" wire:model="confirm_password" class="w-full border-gray-300 rounded-lg p-2">
            </div>

            <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600">
                Đổi mật khẩu
            </button>
        </form>
    </div>

</div>