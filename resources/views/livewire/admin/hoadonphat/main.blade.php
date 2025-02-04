<!-- Main Section -->
<main class="flex-1 overflow-y-auto p-6">
    <h1 class="text-center font-bold text-2xl mb-6">Quản Lý Hóa Đơn Phạt</h1>

    <!-- Button Tạo Đơn Mới -->
    <div class="mb-4 text-left">
        <button wire:click="openModal" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700">
            Tạo đơn phạt mới
        </button>
    </div>

    <!-- Bảng Quản Lý Đơn -->
    <div class="overflow-x-auto">
        <div class="flex justify-between">
            <div class="mb-4 flex justify-start">
                <input type="text" wire:model.live="searchName" placeholder="Tìm kiếm theo ID"
                    class="border border-gray-300 px-4 py-2 rounded-md focus:outline-none " />
            </div>
        </div>

        <table class="table-auto w-full border-collapse border border-gray-300">
            <thead class="bg-gray-100">
                <tr>
                    <th class="border border-gray-300 px-4 py-2">ID Phạt</th>
                    <th class="border border-gray-300 px-4 py-2">Ngày Lập</th>
                    <th class="border border-gray-300 px-4 py-2">Ngày Thanh Toán</th>
                    <th class="border border-gray-300 px-4 py-2">Trạng Thái</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($hoadonphats as $hoadonphat)
                    <tr class="hover:bg-gray-100">
                        <td class="border border-gray-300 px-4 py-2 text-center">{{ $hoadonphat->phat_id}}</td>
                        <td class="border border-gray-300 px-4 py-2 text-center">{{ $hoadonphat->ngay_lap}}</td>
                        <td class="border border-gray-300 px-4 py-2 text-center">{{ $hoadonphat->ngay_thanh_toan}}</td>
                        <td class="border border-gray-300 px-4 py-2 text-center">{{ $hoadonphat->trang_thai}}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="10" class="border border-gray-300 px-4 py-2 text-center">Không có hóa đơn phạt.</td>
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
                    {{ $isEditMode ? 'Cập nhật đơn phạt' : 'Tạo đơn phạt' }}
                </h2>
                <button type="button" wire:click="closeModal"
                    class="w-10 h-10 bg-gray-500 text-white text-xl rounded-full flex items-center justify-center hover:bg-gray-600 focus:outline-none transition-transform transform hover:scale-110">
                    X
                </button>

            </div>

            <!-- Form -->
            <form wire:submit.prevent="{{ $isEditMode ? 'updateHoaDonPhat' : 'createHoaDonPhat' }}"
                class=" h-auto overflow-auto">
                <div class="mb-4">
                    <label for="phat_id" class="block font-semibold">ID Phạt</label>
                    <select id="phat_id" wire:model.defer="phat_id"
                        class="w-full border border-gray-300 rounded-md px-3 py-2">
                        <option value="">-- Chọn ID --</option>
                        @foreach($phats as $phat)
                            <option value="{{ $phat->id }}">{{ $phat->id }}</option>
                        @endforeach
                    </select>
                    @error('phat_id') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>

                <div class="mb-4">
                    <label for="ngay_lap" class="block font-semibold">Ngày Lập</label>
                    <input type="text" id="ngay_lap" wire:model.defer="ngay_lap"
                        class="w-full border border-gray-300 rounded-md px-3 py-2">
                    @error('ngay_lap') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>

                <div class="mb-4">
                    <label for="ngay_thanh_toan" class="block font-semibold">Ngày Thanh Toán</label>
                    <input type="text" id="ngay_thanh_toan" wire:model.defer="ngay_thanh_toan"
                        class="w-full border border-gray-300 rounded-md px-3 py-2">
                    @error('ngay_thanh_toan') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>

                <div class="mb-4">
                    <label for="trang_thai" class="block font-semibold">Trạng Thái</label>
                    <input type="text" id="trang_thai" wire:model.defer="trang_thai"
                        class="w-full border border-gray-300 rounded-md px-3 py-2">
                    @error('trang_thai') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
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
            <p class="text-center mb-6">Bạn có chắc chắn muốn xóa hóa đơn phạt này không?
            </p>
            <p class="text-center mb-6">Thao tác này không thể hoàn
                tác.
            </p>
            <div class="flex justify-center space-x-4">
                <button type="button" wire:click="closeConfirmModal"
                    class="bg-gray-500 text-white px-4 py-2 rounded-md hover:bg-gray-600">Huỷ</button>
                <button type="button" wire:click="deleteHoaDonPhat"
                    class="bg-red-600 text-white px-4 py-2 rounded-md hover:bg-red-700">Xóa</button>
            </div>
        </div>
    </div>
    <div class="flex justify-center mt-6">
        <div class="inline-flex items-center space-x-2">
            <!-- Previous Page Button -->
            @if($hoadonphats->onFirstPage())
                <span class="px-4 py-2 text-gray-400 bg-gray-200 rounded-md cursor-not-allowed">Previous</span>
            @else
                <a href="{{ $hoadonphats->previousPageUrl() }}"
                    class="px-4 py-2 text-white bg-blue-600 rounded-md hover:bg-blue-700">Previous</a>
            @endif

            <!-- Page Numbers -->
            @foreach ($hoadonphats->getUrlRange(1, $hoadonphats->lastPage()) as $page => $url)

                <a wire:click.prevent="gotoPage({{ $page }})" href="#"
                    class="{{ $page == $hoadonphats->currentPage() ? 'bg-blue-600 text-white' : 'text-blue-600 border border-gray-300 hover:bg-gray-100' }} px-4 py-2 rounded-md">
                    {{ $page }}
                </a>
            @endforeach

            <!-- Next Page Button -->
            @if($hoadonphats->hasMorePages())
                <a href="{{ $hoadonphats->nextPageUrl() }}"
                    class="px-4 py-2 text-white bg-blue-600 rounded-md hover:bg-blue-700">Next</a>
            @else
                <span class="px-4 py-2 text-gray-400 bg-gray-200 rounded-md cursor-not-allowed">Next</span>
            @endif
        </div>
    </div>

</main>