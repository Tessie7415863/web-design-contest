<!-- Main Section -->
<main class="flex-1 overflow-y-auto p-6">
    <h1 class="text-center font-bold text-2xl mb-6">Quản Lý Môn Học</h1>

    <!-- Button Tạo Môn Học Mới -->
    <div class="mb-4 text-left">
        <button wire:click="openModal" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700">
            Tạo Môn Mới
        </button>
    </div>

    <!-- Bảng Quản Lý Môn -->
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
                    <th class="border border-gray-300 px-4 py-2">Tên Môn</th>
                    <th class="border border-gray-300 px-4 py-2">ID Ngành</th>
                    <th class="border border-gray-300 px-4 py-2">Hành động</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($monhocs as $monhoc)
                    <tr class="hover:bg-gray-100">
                        <td class="border border-gray-300 px-4 py-2 text-center">{{ $monhoc->id }}</td>
                        <td class="border border-gray-300 px-4 py-2 text-center">{{ $monhoc->ten_mon }}</td>
                        <td class="border border-gray-300 px-4 py-2 text-center">{{ $monhoc->nganh_id }} -
                            {{ $monhoc->nganh->ten_nganh }}
                        </td>
                        <td class="border border-gray-300 px-4 py-2 flex justify-center space-x-2">
                            <button wire:click="editMonHoc({{ $monhoc->id }})"
                                class="bg-yellow-500 text-white px-3 py-1 rounded-md hover:bg-yellow-600">
                                Sửa
                            </button>
                            <button wire:click="openConfirmModal({{ $monhoc->id }})"
                                class="bg-red-600 text-white px-3 py-1 rounded-md hover:bg-red-700">
                                Xoá
                            </button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="border border-gray-300 px-4 py-2 text-center">Không có dữ liệu môn.</td>
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
                    {{ $isEditMode ? 'Cập nhật môn' : 'Tạo môn mới' }}
                </h2>
                <button type="button" wire:click="closeModal"
                    class="w-10 h-10 bg-gray-500 text-white text-xl rounded-full flex items-center justify-center hover:bg-gray-600 focus:outline-none transition-transform transform hover:scale-110">
                    X
                </button>

            </div>

            <!-- Form -->
            <form wire:submit.prevent="{{ $isEditMode ? 'updateMonHoc' : 'createMonHoc' }}"
                class=" h-auto overflow-auto">
                <div class="mb-4">
                    <label for="ten_mon" class="block font-semibold">Tên môn</label>
                    <input type="text" id="ten_mon" wire:model.defer="ten_mon"
                        class="w-full border border-gray-300 rounded-md px-3 py-2">
                    @error('ten_mon') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>

                <div class="mb-4">
                    <label for="nganh_id" class="block font-semibold">Ngành</label>
                    <select id="nganh_id" wire:model.defer="nganh_id"
                        class="w-full border border-gray-300 rounded-md px-3 py-2">
                        <option value="">-- Chọn Ngành --</option>
                        @foreach($nganhs as $nganh)
                            <option value="{{ $nganh->id }}">{{ $nganh->ten_nganh }}</option>
                        @endforeach
                    </select>
                    @error('nganh_id') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
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
            <p class="text-center mb-6">Bạn có chắc chắn muốn xóa môn này không?
            </p>
            <p class="text-center mb-6">Thao tác này không thể hoàn
                tác.
            </p>
            <div class="flex justify-center space-x-4">
                <button type="button" wire:click="closeConfirmModal"
                    class="bg-gray-500 text-white px-4 py-2 rounded-md hover:bg-gray-600">Huỷ</button>
                <button type="button" wire:click="deleteMonHoc"
                    class="bg-red-600 text-white px-4 py-2 rounded-md hover:bg-red-700">Xóa</button>
            </div>
        </div>
    </div>
    <div class="flex justify-center mt-6">
        <div class="inline-flex items-center space-x-2">
            <!-- Previous Page Button -->
            @if($monhocs->onFirstPage())
                <span class="px-4 py-2 text-gray-400 bg-gray-200 rounded-md cursor-not-allowed">Previous</span>
            @else
                <a href="{{ $monhocs->previousPageUrl() }}"
                    class="px-4 py-2 text-white bg-blue-600 rounded-md hover:bg-blue-700">Previous</a>
            @endif

            <!-- Page Numbers -->
            @foreach ($monhocs->getUrlRange(1, $monhocs->lastPage()) as $page => $url)
                @if ($page == $monhocs->currentPage())
                    <span class="px-4 py-2 text-white bg-blue-600 rounded-md">{{ $page }}</span>
                @else
                    <a href="{{ $url }}"
                        class="px-4 py-2 text-blue-600 border border-gray-300 rounded-md hover:bg-gray-100">{{ $page }}</a>
                @endif
            @endforeach

            <!-- Next Page Button -->
            @if($monhocs->hasMorePages())
                <a href="{{ $khoas->nextPageUrl() }}"
                    class="px-4 py-2 text-white bg-blue-600 rounded-md hover:bg-blue-700">Next</a>
            @else
                <span class="px-4 py-2 text-gray-400 bg-gray-200 rounded-md cursor-not-allowed">Next</span>
            @endif
        </div>
    </div>

</main>