<!-- Main Section -->
<main class="flex-1 overflow-y-auto p-6">
    <h1 class="text-center font-bold text-2xl mb-6">Quản Lý Cuốn Sách</h1>

    <!-- Button Tạo Cuốn Sách Mới -->
    <div class="mb-4 text-left">
        <button wire:click="openModal" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700">
            Tạo cuốn sách mới
        </button>
    </div>

    <!-- Bảng Quản Lý Vị Trí -->
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
                    <th class="border border-gray-300 px-4 py-2">Sách</th>
                    <th class="border border-gray-300 px-4 py-2">Vị Trí</th>
                    <th class="border border-gray-300 px-4 py-2">Tình Trạng</th>
                    <th class="border border-gray-300 px-4 py-2">Hành động</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($cuonsachs as $cuonsach)
                <tr class="hover:bg-gray-100">
                    <td class="border border-gray-300 px-4 py-2 text-center">{{ $cuonsach->id }}</td>
                    <td class="border border-gray-300 px-4 py-2 text-center">{{ $cuonsach->sach->ten_sach }}</td>
                    <td class="border border-gray-300 px-4 py-2 text-center">
                        {{ $cuonsach->viTriSach->khu_vuc }}, {{ $cuonsach->viTriSach->ke }},
                        {{ $cuonsach->viTriSach->tuong }}
                    </td>
                    <td class="border border-gray-300 px-4 py-2 text-center">
                        {{ match ($cuonsach->tinh_trang)
                        {
                        'Con' => 'Còn',
                        'Bao_tri' => 'Bảo trì',
                        'Muon' => 'Mượn',
                        default => 'Mất'
                        } 
                        }}
                    </td>

                    <td class="border border-gray-300 px-4 py-2 flex justify-center space-x-2">
                        <button wire:click="editCuonSach({{ $cuonsach->id }})"
                            class="bg-yellow-500 text-white px-3 py-1 rounded-md hover:bg-yellow-600">
                            Sửa
                        </button>
                        <button wire:click="openConfirmModal({{ $cuonsach->id }})"
                            class="bg-red-600 text-white px-3 py-1 rounded-md hover:bg-red-700">
                            Xoá
                        </button>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="10" class="border border-gray-300 px-4 py-2 text-center">Không có cuốn sách nào.
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
                    {{ $isEditMode ? 'Cập nhật vị trí' : 'Tạo sách vị trí' }}
                </h2>
                <button type="button" wire:click="closeModal"
                    class="w-10 h-10 bg-gray-500 text-white text-xl rounded-full flex items-center justify-center hover:bg-gray-600 focus:outline-none transition-transform transform hover:scale-110">
                    X
                </button>

            </div>

            <!-- Form -->
            <form wire:submit.prevent="{{ $isEditMode ? 'updateCuonSach' : 'createCuonSach' }}"
                class=" h-auto overflow-auto">
                <div class="mb-4">
                    <label for="sach_id" class="block font-semibold">ID Sách</label>
                    <select id="sach_id" wire:model.defer="sach_id"
                        class="w-full border border-gray-300 rounded-md px-3 py-2">
                        <option value="">-- Chọn ID --</option>
                        @foreach($sachs as $sach)
                        <option value="{{ $sach->id }}">{{ $sach->ten_sach }}</option>
                        @endforeach
                    </select>
                    @error('sach_id') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>

                <div class="mb-4">
                    <label for="vi_tri_sach_id" class="block font-semibold">ID Vị Trí</label>
                    <select id="vi_tri_sach_id" wire:model.defer="vi_tri_sach_id"
                        class="w-full border border-gray-300 rounded-md px-3 py-2">
                        <option value="">-- Chọn ID --</option>
                        @foreach($vitrisachs as $vitrisach)
                        <option value="{{ $vitrisach->id }}">{{ $vitrisach->id }}</option>
                        @endforeach
                    </select>
                    @error('vi_tri_sach_id') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>

                <div class="mb-4">
                    <label for="tinh_trang" class="block font-semibold">Tình Trạng</label>
                    <select id="tinh_trang" wire:model.defer="tinh_trang"
                        class="w-full border border-gray-300 rounded-md px-3 py-2">
                        <option value="">-- Chọn tình trạng --</option>
                        <option value="Con">Còn</option>
                        <option value="Bao_tri">Bảo trì</option>
                        <option value="Mat">Mất</option>
                        <option value="Muon">Mượn</option>
                    </select>
                    @error('tinh_trang')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
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
            <p class="text-center mb-6">Bạn có chắc chắn muốn xóa cuốn sách này không?
            </p>
            <p class="text-center mb-6">Thao tác này không thể hoàn
                tác.
            </p>
            <div class="flex justify-center space-x-4">
                <button type="button" wire:click="closeConfirmModal"
                    class="bg-gray-500 text-white px-4 py-2 rounded-md hover:bg-gray-600">Huỷ</button>
                <button type="button" wire:click="deleteCuonSach"
                    class="bg-red-600 text-white px-4 py-2 rounded-md hover:bg-red-700">Xóa</button>
            </div>
        </div>
    </div>
    <div class="flex justify-center mt-6">
        <div class="inline-flex items-center space-x-2">
            <!-- Previous Page Button -->
            @if($cuonsachs->onFirstPage())
            <span class="px-4 py-2 text-gray-400 bg-gray-200 rounded-md cursor-not-allowed">Previous</span>
            @else
            <a href="{{ $cuonsachs->previousPageUrl() }}"
                class="px-4 py-2 text-white bg-blue-600 rounded-md hover:bg-blue-700">Previous</a>
            @endif

            <!-- Page Numbers -->
            @foreach ($cuonsachs->getUrlRange(1, $cuonsachs->lastPage()) as $page => $url)

            <a wire:click.prevent="gotoPage({{ $page }})" href="#"
                class="{{ $page == $cuonsachs->currentPage() ? 'bg-blue-600 text-white' : 'text-blue-600 border border-gray-300 hover:bg-gray-100' }} px-4 py-2 rounded-md">
                {{ $page }}
            </a>
            @endforeach

            <!-- Next Page Button -->
            @if($cuonsachs->hasMorePages())
            <a href="{{ $cuonsachs->nextPageUrl() }}"
                class="px-4 py-2 text-white bg-blue-600 rounded-md hover:bg-blue-700">Next</a>
            @else
            <span class="px-4 py-2 text-gray-400 bg-gray-200 rounded-md cursor-not-allowed">Next</span>
            @endif
        </div>
    </div>

</main>