<!-- Main Section -->
<main class="flex-1 overflow-y-auto p-6">
    <h1 class="text-center font-bold text-2xl mb-6">Quản lý Sinh Viên</h1>

    <!-- Button Tạo Sinh Viên Mới -->
    <div class="mb-4 text-left">
        <button wire:click="openModal" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700">
            Tạo Sinh Viên mới
        </button>
    </div>

    <!-- Bảng Quản Lý Sinh Viên -->
    <div class="overflow-x-auto">
        <div class="flex justify-between">
            <div class="mb-4 flex justify-start">
                <input type="text" wire:model.live="searchName" placeholder="Tìm kiếm theo tên"
                    class="border border-gray-300 px-4 py-2 rounded-md focus:outline-none " />
            </div>
        </div>

        <table class="table-auto w-full border-collapse border border-gray-300">
            <thead class="bg-gray-100">
                <tr>
                    <th class="border border-gray-300 px-4 py-2">ID</th>
                    <th class="border border-gray-300 px-4 py-2">Họ tên</th>
                    <th class="border border-gray-300 px-4 py-2">Ngày sinh</th>
                    <th class="border border-gray-300 px-4 py-2">Lớp</th>
                    <th class="border border-gray-300 px-4 py-2">Email</th>
                    <th class="border border-gray-300 px-4 py-2">Tài khoản</th>
                    <th class="border border-gray-300 px-4 py-2">Mật khẩu</th>
                    <th class="border border-gray-300 px-4 py-2">Số điện thoại</th>
                    <th class="border border-gray-300 px-4 py-2">Địa chỉ</th>
                    <th class="border border-gray-300 px-4 py-2">Hành động</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($sinhviens as $sinhvien)
                <tr class="hover:bg-gray-100">
                    <td class="border border-gray-300 px-4 py-2 text-center">{{ $sinhvien->id }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $sinhvien->ho_ten }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $sinhvien->ngay_sinh }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $sinhvien->lop }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $sinhvien->email }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $sinhvien->tai_khoan }}</td>
                    <td class="border border-gray-300 px-4 py-2 text-center  truncate max-w-xs">
                        {{ $sinhvien->password }}
                    </td>
                    <td class="border border-gray-300 px-4 py-2">{{ $sinhvien->sdt }}</td>
                    <td class="border border-gray-300 px-4 py-2 truncate max-w-xs">
                        {{ $sinhvien->dia_chi }}
                    </td>
                    <td class="border border-gray-300 px-4 py-2 flex justify-center space-x-2">
                        <button wire:click="editSinhVien({{ $sinhvien->id }})"
                            class="bg-yellow-500 text-white px-3 py-1 rounded-md hover:bg-yellow-600">
                            Sửa
                        </button>
                        <button wire:click="openConfirmModal({{ $sinhvien->id }})"
                            class="bg-red-600 text-white px-3 py-1 rounded-md hover:bg-red-700">
                            Xoá
                        </button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- modal -->
    <div x-data="{ open: @entangle('isModalOpen') }" x-show="open"
        class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50 ">
        <div class="bg-white rounded-lg shadow-lg p-6 w-1/3">
            <div class="flex justify-between">
                <h2 class="text-xl font-bold mb-4">
                    {{ $isEditMode ? 'Cập nhật Sinh Viên' : 'Tạo Sinh Viên mới' }}
                </h2>
                <button type="button" wire:click="closeModal"
                    class="w-10 h-10 bg-gray-500 text-white text-xl rounded-full flex items-center justify-center hover:bg-gray-600 focus:outline-none transition-transform transform hover:scale-110">
                    X
                </button>

            </div>
            <!-- Form -->
            <form wire:submit.prevent="{{ $isEditMode ? 'updateSinhVien' : 'createSinhVien' }}"
                class=" h-[700px] overflow-auto">
                <div class="mb-4">
                    <label for="ho_ten" class="block font-semibold">Họ tên</label>
                    <input type="text" id="ho_ten" wire:model.defer="ho_ten"
                        class="w-full border border-gray-300 rounded-md px-3 py-2">
                    @error('ho_ten') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>
                <div class="mb-4">
                    <label for="email" class="block font-semibold">Email</label>
                    <input type="email" id="email" wire:model.defer="email"
                        class="w-full border border-gray-300 rounded-md px-3 py-2">
                    @error('email') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>
                <div class="mb-4">
                    <label for="password" class="block font-semibold">Mật khẩu</label>
                    <input type="password" id="password" wire:model.defer="password"
                        class="w-full border border-gray-300 rounded-md px-3 py-2">
                    @error('password') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>
                <div class="mb-4">
                    <label for="ngay_sinh" class="block font-semibold">Ngày sinh</label>
                    <input type="date" id="ngay_sinh" wire:model.defer="ngay_sinh"
                        class="w-full border border-gray-300 rounded-md px-3 py-2">
                    @error('ngay_sinh') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>
                <div class="mb-4">
                    <label for="gioi_tinh" class="block font-semibold">Giới tính</label>
                    <select id="gioi_tinh" wire:model.defer="gioi_tinh"
                        class="w-full border border-gray-300 rounded-md px-3 py-2">
                        <option value="">-- Chọn giới tính --</option>
                        <option value="Nam">Nam</option>
                        <option value="Nữ">Nữ</option>
                        <option value="Không rõ">Không rõ</option>
                    </select>
                    @error('gioi_tinh') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>
                <div class="mb-4">
                    <label for="tai_khoan" class="block font-semibold">Tài khoản</label>
                    <input type="text" id="tai_khoan" wire:model.defer="tai_khoan"
                        class="w-full border border-gray-300 rounded-md px-3 py-2">
                    @error('tai_khoan') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>
                <div class="mb-4">
                    <label for="lop" class="block font-semibold">Lớp</label>
                    <input type="text" id="lop" wire:model.defer="lop"
                        class="w-full border border-gray-300 rounded-md px-3 py-2">
                    @error('lop') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>
                <div class="mb-4">
                    <label for="sdt" class="block font-semibold">Số điện thoại</label>
                    <input type="text" id="sdt" wire:model.defer="sdt"
                        class="w-full border border-gray-300 rounded-md px-3 py-2">
                    @error('sdt') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>
                <div class="mb-4">
                    <label for="dia_chi" class="block font-semibold">Địa chỉ</label>
                    <input type="text" id="dia_chi" wire:model.defer="dia_chi"
                        class="w-full border border-gray-300 rounded-md px-3 py-2">
                    @error('dia_chi') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>
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
            <p class="text-center mb-6">Bạn có chắc chắn muốn xóa sinh viên này không?
            </p>
            <p class="text-center mb-6">Thao tác này không thể hoàn
                tác.
            </p>
            <div class="flex justify-center space-x-4">
                <button type="button" wire:click="closeConfirmModal"
                    class="bg-gray-500 text-white px-4 py-2 rounded-md hover:bg-gray-600">Huỷ</button>
                <button type="button" wire:click="deleteSinhVien"
                    class="bg-red-600 text-white px-4 py-2 rounded-md hover:bg-red-700">Xóa</button>
            </div>
        </div>
    </div>
    <div class="flex justify-center mt-6">
        <div class="inline-flex items-center space-x-2">
            <!-- Previous Page Button -->
            @if($sinhviens->onFirstPage())
            <span class="px-4 py-2 text-gray-400 bg-gray-200 rounded-md cursor-not-allowed">Previous</span>
            @else
            <a href="{{ $sinhviens->previousPageUrl() }}"
                class="px-4 py-2 text-white bg-blue-600 rounded-md hover:bg-blue-700">Previous</a>
            @endif

            <!-- Page Numbers -->
            @foreach ($sinhviens->getUrlRange(1, $sinhviens->lastPage()) as $page => $url)
            @if ($page == $sinhviens->currentPage())
            <span class="px-4 py-2 text-white bg-blue-600 rounded-md">{{ $page }}</span>
            @else
            <a href="{{ $url }}"
                class="px-4 py-2 text-blue-600 border border-gray-300 rounded-md hover:bg-gray-100">{{ $page }}</a>
            @endif
            @endforeach

            <!-- Next Page Button -->
            @if($sinhviens->hasMorePages())
            <a href="{{ $sinhviens->nextPageUrl() }}"
                class="px-4 py-2 text-white bg-blue-600 rounded-md hover:bg-blue-700">Next</a>
            @else
            <span class="px-4 py-2 text-gray-400 bg-gray-200 rounded-md cursor-not-allowed">Next</span>
            @endif
        </div>
    </div>

</main>