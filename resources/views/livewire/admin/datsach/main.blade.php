<!-- Main Section -->
<main class="flex-1 overflow-y-auto p-6">
    <h1 class="text-center font-bold text-2xl mb-6">Quản Lý Đặt Sách</h1>

    <!-- Button Tạo Lệnh Đặt Sách Mới -->
    <div class="mb-4 text-left">
        <button wire:click="openModal" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700">
            Tạo lệnh đặt sách mới
        </button>
    </div>

    <!-- Bảng Quản Lý Lệnh Đặt Sách -->
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
                    <th class="border border-gray-300 px-4 py-2">ID Sinh Viên</th>
                    <th class="border border-gray-300 px-4 py-2">ID Cuốn Sách</th>
                    <th class="border border-gray-300 px-4 py-2">Ngày Đặt</th>
                    <th class="border border-gray-300 px-4 py-2">Tình Trạng</th>
                    <th class="border border-gray-300 px-4 py-2">Hành động</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($datsachs as $datsach)
                    <tr class="hover:bg-gray-100">
                        <td class="border border-gray-300 px-4 py-2 text-center">{{ $datsach->id }}</td>
                        <td class="border border-gray-300 px-4 py-2 text-center">{{ $datsach->sinh_vien_id }}</td>
                        <td class="border border-gray-300 px-4 py-2 text-center">{{ $datsach->cuon_sach_id }}</td>
                        <td class="border border-gray-300 px-4 py-2 text-center">{{ $datsach->ngay_dat }}</td>
                        <td class="border border-gray-300 px-4 py-2 text-center">{{ $datsach->tinh_trang }}</td>
                        <td class="border border-gray-300 px-4 py-2 flex justify-center space-x-2">
                            <button wire:click="editDatSach({{ $datsach->id }})"
                                class="bg-yellow-500 text-white px-3 py-1 rounded-md hover:bg-yellow-600">
                                Sửa
                            </button>
                            <button wire:click="openConfirmModal({{ $datsach->id }})"
                                class="bg-red-600 text-white px-3 py-1 rounded-md hover:bg-red-700">
                                Xoá
                            </button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="border border-gray-300 px-4 py-2 text-center">Không có dữ liệu đặt sách.
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
                    {{ $isEditMode ? 'Cập nhật đặt sách' : 'Tạo đặt sách mới' }}
                </h2>
                <button type="button" wire:click="closeModal"
                    class="w-10 h-10 bg-gray-500 text-white text-xl rounded-full flex items-center justify-center hover:bg-gray-600 focus:outline-none transition-transform transform hover:scale-110">
                    X
                </button>

            </div>

            <!-- Form -->
            <form wire:submit.prevent="{{ $isEditMode ? 'updateDatSach' : 'createDatSach' }}"
                class=" h-auto overflow-auto">
                <div class="mb-4">
                    <label for="sinh_vien_id" class="block font-semibold">ID Sinh Viên</label>
                    <select id="sinh_vien_id" wire:model.defer="sinh_vien_id"
                        class="w-full border border-gray-300 rounded-md px-3 py-2">
                        <option value="">-- Chọn ID --</option>
                        @foreach($sinhviens as $sinhvien)
                            <option value="{{ $sinhvien->id }}">{{ $sinhvien->ho_ten }}</option>
                        @endforeach
                    </select>
                    @error('sinh_vien_id') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>

                <div class="mb-4">
                    <label for="cuon_sach_id" class="block font-semibold">ID Cuốn Sách</label>
                    <select id="cuon_sach_id" wire:model.defer="cuon_sach_id"
                        class="w-full border border-gray-300 rounded-md px-3 py-2">
                        <option value="">-- Chọn ID --</option>
                        @foreach($cuonsachs as $cuonsach)
                            <option value="{{ $cuonsach->id }}">{{ $cuonsach->sach_id }}</option>
                        @endforeach
                    </select>
                    @error('cuon_sach_id') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>

                <div class="mb-4">
                    <label for="ngay_dat" class="block font-semibold">Ngày Đặt</label>
                    <input type="text" id="ngay_dat" wire:model.defer="ngay_dat"
                        class="w-full border border-gray-300 rounded-md px-3 py-2">
                    @error('ngay_dat') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>

                <div class="mb-4">
                    <label for="tinh_trang" class="block font-semibold">Tình Trạng</label>
                    <input type="text" id="tinh_trang" wire:model.defer="tinh_trang"
                        class="w-full border border-gray-300 rounded-md px-3 py-2">
                    @error('tinh_trang') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
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
            <p class="text-center mb-6">Bạn có chắc chắn muốn xóa đặt sách này không?
            </p>
            <p class="text-center mb-6">Thao tác này không thể hoàn
                tác.
            </p>
            <div class="flex justify-center space-x-4">
                <button type="button" wire:click="closeConfirmModal"
                    class="bg-gray-500 text-white px-4 py-2 rounded-md hover:bg-gray-600">Huỷ</button>
                <button type="button" wire:click="deleteDatSach"
                    class="bg-red-600 text-white px-4 py-2 rounded-md hover:bg-red-700">Xóa</button>
            </div>
        </div>
    </div>
    <div class="flex justify-center mt-6">
        <div class="inline-flex items-center space-x-2">
            <!-- Previous Page Button -->
            @if($datsachs->onFirstPage())
                <span class="px-4 py-2 text-gray-400 bg-gray-200 rounded-md cursor-not-allowed">Previous</span>
            @else
                <a href="{{ $datsachs->previousPageUrl() }}"
                    class="px-4 py-2 text-white bg-blue-600 rounded-md hover:bg-blue-700">Previous</a>
            @endif

            <!-- Page Numbers -->
            @foreach ($datsachs->getUrlRange(1, $datsachs->lastPage()) as $page => $url)

                <a wire:click.prevent="gotoPage({{ $page }})" href="#"
                    class="{{ $page == $datsachs->currentPage() ? 'bg-blue-600 text-white' : 'text-blue-600 border border-gray-300 hover:bg-gray-100' }} px-4 py-2 rounded-md">
                    {{ $page }}
                </a>
            @endforeach

            <!-- Next Page Button -->
            @if($datsachs->hasMorePages())
                <a href="{{ $datsachs->nextPageUrl() }}"
                    class="px-4 py-2 text-white bg-blue-600 rounded-md hover:bg-blue-700">Next</a>
            @else
                <span class="px-4 py-2 text-gray-400 bg-gray-200 rounded-md cursor-not-allowed">Next</span>
            @endif
        </div>
    </div>

</main>