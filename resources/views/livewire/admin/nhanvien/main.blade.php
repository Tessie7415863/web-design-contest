<!-- Main Section -->
<main class="flex-1 overflow-y-auto p-6">
    <h1 class="text-center font-bold text-2xl mb-6">Quản lý Nhân Viên</h1>

    <!-- Button Tạo Nhân Viên Mới -->
    <div class="mb-4 text-left">
        <button wire:click="openModal" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700">
            Tạo nhân viên mới
        </button>
    </div>

    <!-- Bảng Quản Lý Nhân Viên -->
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
                    <th class="border border-gray-300 px-4 py-2">ID Người Dùng</th>
                    <th class="border border-gray-300 px-4 py-2">Họ Tên</th>
                    <th class="border border-gray-300 px-4 py-2">Chức Vụ</th>
                    <th class="border border-gray-300 px-4 py-2">Email</th>
                    <th class="border border-gray-300 px-4 py-2">SĐT</th>
                    <th class="border border-gray-300 px-4 py-2">Địa Chỉ</th>
                    <th class="border border-gray-300 px-4 py-2">ID Bộ Phận</th>
                    <th class="border border-gray-300 px-4 py-2">Hành động</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($nhanviens as $nhanvien)
                    <tr class="hover:bg-gray-100">
                        <td class="border border-gray-300 px-4 py-2 text-center">{{ $nhanvien->id }}</td>
                        <td class="border border-gray-300 px-4 py-2 text-center">{{ $nhanvien->user_id }}</td>
                        <td class="border border-gray-300 px-4 py-2 text-center">{{ $nhanvien->ho_ten }}</td>
                        <td class="border border-gray-300 px-4 py-2 text-center">{{ $nhanvien->chuc_vu }}</td>
                        <td class="border border-gray-300 px-4 py-2 text-center">{{ $nhanvien->email }}</td>
                        <td class="border border-gray-300 px-4 py-2 text-center">{{ $nhanvien->sdt }}</td>
                        <td class="border border-gray-300 px-4 py-2 text-center">{{ $nhanvien->dia_chi ?? 'Chưa gán' }}</td>
                        <td class="border border-gray-300 px-4 py-2 text-center">{{ $nhanvien->bo_phan_id }}</td>
                        <td class="border border-gray-300 px-4 py-2 flex justify-center space-x-2">
                            <button wire:click="editNhanVien({{ $nhanvien->id }})"
                                class="bg-yellow-500 text-white px-3 py-1 rounded-md hover:bg-yellow-600">
                                Sửa
                            </button>
                            <button wire:click="openConfirmModal({{ $nhanvien->id }})"
                                class="bg-red-600 text-white px-3 py-1 rounded-md hover:bg-red-700">
                                Xoá
                            </button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="10" class="border border-gray-300 px-4 py-2 text-center">Không có dữ liệu nhân viên.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- modal -->
    <div x-data="{ open: @entangle('isModalOpen') }" x-show="open"
        class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50 ">
        <div class="bg-white rounded-lg shadow-lg p-6 w-1/3">
            <div class="flex justify-between">
                <h2 class="text-xl font-bold mb-4">
                    {{ $isEditMode ? 'Cập nhật nhân viên' : 'Tạo nhân viên mới' }}
                </h2>
                <button type="button" wire:click="closeModal"
                    class="w-10 h-10 bg-gray-500 text-white text-xl rounded-full flex items-center justify-center hover:bg-gray-600 focus:outline-none transition-transform transform hover:scale-110">
                    X
                </button>

            </div>

            <!-- Form -->
            <form wire:submit.prevent="{{ $isEditMode ? 'updateNhanVien' : 'createNhanVien' }}"
                class=" h-auto overflow-auto">
                <div class="mb-4">
                    <label for="user_id" class="block font-semibold">ID Người Dùng</label>
                    <select id="user_id" wire:model.defer="user_id"
                        class="w-full border border-gray-300 rounded-md px-3 py-2">
                        <option value="">-- Chọn ID --</option>
                        @foreach($users as $user)
                            <option value="{{ $user->id }}">{{ $user->id }}</option>
                        @endforeach
                    </select>
                    @error('user_id') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>

                <div class="mb-4">
                    <label for="ho_ten" class="block font-semibold">Họ Tên</label>
                    <input type="text" id="ho_ten" wire:model.defer="ho_ten"
                        class="w-full border border-gray-300 rounded-md px-3 py-2">
                    @error('ho_ten') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>

                <div class="mb-4">
                    <label for="chuc_vu" class="block font-semibold">Chức Vụ</label>
                    <input type="text" id="chuc_vu" wire:model.defer="chuc_vu"
                        class="w-full border border-gray-300 rounded-md px-3 py-2">
                    @error('chuc_vu') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>

                <div class="mb-4">
                    <label for="email" class="block font-semibold">Email</label>
                    <input type="text" id="email" wire:model.defer="email"
                        class="w-full border border-gray-300 rounded-md px-3 py-2">
                    @error('email') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>

                <div class="mb-4">
                    <label for="sdt" class="block font-semibold">SĐT</label>
                    <input type="text" id="sdt" wire:model.defer="sdt"
                        class="w-full border border-gray-300 rounded-md px-3 py-2">
                    @error('sdt') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>

                <div class="mb-4">
                    <label for="dia_chi" class="block font-semibold">Địa Chỉ</label>
                    <input type="text" id="dia_chi" wire:model.defer="dia_chi"
                        class="w-full border border-gray-300 rounded-md px-3 py-2">
                    @error('dia_chi') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>

                <div class="mb-4">
                    <label for="bo_phan_id" class="block font-semibold">Bộ Phận</label>
                    <select id="bo_phan_id" wire:model.defer="bo_phan_id"
                        class="w-full border border-gray-300 rounded-md px-3 py-2">
                        <option value="">-- Chọn Bộ Phận --</option>
                        @foreach($bophans as $bophan)
                            <option value="{{ $bophan->id }}">{{ $bophan->ten_bo_phan }}</option>
                        @endforeach
                    </select>
                    @error('bo_phan_id') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
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
            <p class="text-center mb-6">Bạn có chắc chắn muốn xóa nhân viên này không?
            </p>
            <p class="text-center mb-6">Thao tác này không thể hoàn
                tác.
            </p>
            <div class="flex justify-center space-x-4">
                <button type="button" wire:click="closeConfirmModal"
                    class="bg-gray-500 text-white px-4 py-2 rounded-md hover:bg-gray-600">Huỷ</button>
                <button type="button" wire:click="deleteNhanVien"
                    class="bg-red-600 text-white px-4 py-2 rounded-md hover:bg-red-700">Xóa</button>
            </div>
        </div>
    </div>
    <div class="flex justify-center mt-6">
        <div class="inline-flex items-center space-x-2">
            <!-- Previous Page Button -->
            @if($nhanviens->onFirstPage())
                <span class="px-4 py-2 text-gray-400 bg-gray-200 rounded-md cursor-not-allowed">Previous</span>
            @else
                <a href="{{ $nhanviens->previousPageUrl() }}"
                    class="px-4 py-2 text-white bg-blue-600 rounded-md hover:bg-blue-700">Previous</a>
            @endif

            <!-- Page Numbers -->
            @foreach ($nhanviens->getUrlRange(1, $nhanviens->lastPage()) as $page => $url)
                <!-- @if ($page == $nhanviens->currentPage())
                                                                                                                                <span class="px-4 py-2 text-white bg-blue-600 rounded-md">{{ $page }}</span>
                                                                                                                            @else
                                                                                                                                <a href="{{ $url }}"
                                                                                                                                    class="px-4 py-2 text-blue-600 border border-gray-300 rounded-md hover:bg-gray-100">{{ $page }}</a>
                                                                                                                            @endif -->

                <a wire:click.prevent="gotoPage({{ $page }})" href="#"
                    class="{{ $page == $nhanviens->currentPage() ? 'bg-blue-600 text-white' : 'text-blue-600 border border-gray-300 hover:bg-gray-100' }} px-4 py-2 rounded-md">
                    {{ $page }}
                </a>
            @endforeach

            <!-- Next Page Button -->
            @if($nhanviens->hasMorePages())
                <a href="{{ $nhanviens->nextPageUrl() }}"
                    class="px-4 py-2 text-white bg-blue-600 rounded-md hover:bg-blue-700">Next</a>
            @else
                <span class="px-4 py-2 text-gray-400 bg-gray-200 rounded-md cursor-not-allowed">Next</span>
            @endif
        </div>
    </div>

</main>