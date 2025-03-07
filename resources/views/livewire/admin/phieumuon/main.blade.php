<!-- Main Section -->
<main class="flex-1 overflow-y-auto p-6">
    <h1 class="text-center font-bold text-2xl mb-6">Quản Lý Phiếu Mượn</h1>

    <!-- Button Tạo Phiếu Mượn Mới -->
    <div class="mb-4 text-left">
        <button wire:click="openModal" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700">
            Tạo Phiếu Mượn Mới
        </button>
    </div>

    <!-- Bảng Quản Lý Phiếu Mượn -->
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
                    <th class="border border-gray-300 px-4 py-2">ID Nhân Viên</th>
                    <th class="border border-gray-300 px-4 py-2">Ngày Mượn</th>
                    <th class="border border-gray-300 px-4 py-2">Ngày Hẹn Trả</th>
                    <th class="border border-gray-300 px-4 py-2">Ngày Trả</th>
                    <th class="border border-gray-300 px-4 py-2">Tình Trạng</th>
                    <th class="border border-gray-300 px-4 py-2">Hành động</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($phieumuons as $phieumuon)
                <tr class="hover:bg-gray-100">
                    <td class="border border-gray-300 px-4 py-2 text-center">{{ $phieumuon->id }}</td>
                    <td class="border border-gray-300 px-4 py-2 text-center">
                        {{ $phieumuon->sinhvien->ho_ten }}
                    </td>
                    <td class="border border-gray-300 px-4 py-2 text-center">
                        {{ $phieumuon->nhanvien->ho_ten ?? 'Không có nhân viên.' }}
                    </td>
                    <td class="border border-gray-300 px-4 py-2 text-center">
                        {{$phieumuon->ngay_muon? \Carbon\Carbon::parse($phieumuon->ngay_muon)->format('d/m/Y'):'Trống' }}
                    </td>
                    <td class="border border-gray-300 px-4 py-2 text-center">
                        {{ \Carbon\Carbon::parse($phieumuon->ngay_hen_tra)->format('d/m/Y') }}
                    </td>
                    <td class="border border-gray-300 px-4 py-2 text-center">
                        {{ $phieumuon->ngay_tra ? \Carbon\Carbon::parse($phieumuon->ngay_tra)->format('d/m/Y') : 'Chưa lập' }}

                    </td>
                    <td class="border border-gray-300 px-4 py-2 text-center">
                        @switch($phieumuon->tinh_trang)
                        @case('DangMuon')
                        Đang Mượn
                        @break
                        @case('DaTra')
                        Đã Trả
                        @break
                        @case('QuaHan')
                        Quá Hạn
                        @break
                        @default
                        Không xác định
                        @endswitch
                    </td>
                    <td class="border border-gray-300 px-4 py-2 text-center">
                        <div class="flex justify-center space-x-2">
                            <button wire:click="editPhieuMuon({{ $phieumuon->id }})"
                                class="bg-yellow-500 text-white px-3 py-1 rounded-md hover:bg-yellow-600">
                                Sửa
                            </button>
                            <button wire:click="openConfirmModal({{ $phieumuon->id }})"
                                class="bg-red-600 text-white px-3 py-1 rounded-md hover:bg-red-700">
                                Xoá
                            </button>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="8" class="border border-gray-300 px-4 py-2 text-center">Không có phiếu mượn.</td>
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
                    {{ $isEditMode ? 'Cập nhật phiếu mượn' : 'Tạo phiếu mượn mới' }}
                </h2>
                <button type="button" wire:click="closeModal"
                    class="w-10 h-10 bg-gray-500 text-white text-xl rounded-full flex items-center justify-center hover:bg-gray-600 focus:outline-none transition-transform transform hover:scale-110">
                    X
                </button>

            </div>

            <!-- Form -->
            <form wire:submit.prevent="{{ $isEditMode ? 'updatePhieuMuon' : 'createPhieuMuon' }}"
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
                    <label for="nhan_vien_id" class="block font-semibold">ID Nhân Viên</label>
                    <select id="nhan_vien_id" wire:model.defer="nhan_vien_id"
                        class="w-full border border-gray-300 rounded-md px-3 py-2">
                        <option value="">-- Chọn ID --</option>
                        @foreach($nhanviens as $nhanvien)
                        <option value="{{ $nhanvien->id }}">{{ $nhanvien->ho_ten }}</option>
                        @endforeach
                    </select>
                    @error('nhan_vien_id') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>

                <div class="mb-4">
                    <label for="ngay_muon" class="block font-semibold">Ngày Mượn</label>
                    <input type="date" id="ngay_muon" wire:model.defer="ngay_muon"
                        class="w-full border border-gray-300 rounded-md px-3 py-2">
                    @error('ngay_muon') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>

                <div class="mb-4">
                    <label for="ngay_hen_tra" class="block font-semibold">Ngày Hẹn Trả</label>
                    <input type="date" id="ngay_hen_tra" wire:model.defer="ngay_hen_tra"
                        class="w-full border border-gray-300 rounded-md px-3 py-2">
                    @error('ngay_hen_tra') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>

                <div class="mb-4">
                    <label for="ngay_tra" class="block font-semibold">Ngày Trả</label>
                    <input type="date" id="ngay_tra" wire:model.defer="ngay_tra"
                        class="w-full border border-gray-300 rounded-md px-3 py-2">
                    @error('ngay_tra') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>

                <div class="mb-4">
                    <label for="tinh_trang" class="block font-semibold">Tình Trạng</label>
                    <select id="tinh_trang" wire:model.defer="tinh_trang"
                        class="w-full border border-gray-300 rounded-md px-3 py-2">
                        <option value="">-- Chọn tình trạng --</option>
                        <option value="DangMuon">Đang mượn</option>
                        <option value="DaTra">Đã trả</option>
                        <option value="QuaHan">Quá hạn</option>
                    </select>
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
            <p class="text-center mb-6">Bạn có chắc chắn muốn xóa phiếu mượn này không?
            </p>
            <p class="text-center mb-6">Thao tác này không thể hoàn
                tác.
            </p>
            <div class="flex justify-center space-x-4">
                <button type="button" wire:click="closeConfirmModal"
                    class="bg-gray-500 text-white px-4 py-2 rounded-md hover:bg-gray-600">Huỷ</button>
                <button type="button" wire:click="deletePhieuMuon"
                    class="bg-red-600 text-white px-4 py-2 rounded-md hover:bg-red-700">Xóa</button>
            </div>
        </div>
    </div>
    <div class="flex justify-center mt-6">
        <div class="inline-flex items-center space-x-2">
            <!-- Previous Page Button -->
            @if($phieumuons->onFirstPage())
            <span class="px-4 py-2 text-gray-400 bg-gray-200 rounded-md cursor-not-allowed">Previous</span>
            @else
            <a href="{{ $phieumuons->previousPageUrl() }}"
                class="px-4 py-2 text-white bg-blue-600 rounded-md hover:bg-blue-700">Previous</a>
            @endif

            <!-- Page Numbers -->
            @foreach ($phieumuons->getUrlRange(1, $phieumuons->lastPage()) as $page => $url)
            @if ($page == $phieumuons->currentPage())
            <span class="px-4 py-2 text-white bg-blue-600 rounded-md">{{ $page }}</span>
            @else
            <a href="{{ $url }}"
                class="px-4 py-2 text-blue-600 border border-gray-300 rounded-md hover:bg-gray-100">{{ $page }}</a>
            @endif
            @endforeach

            <!-- Next Page Button -->
            @if($phieumuons->hasMorePages())
            <a href="{{ $phieumuons->nextPageUrl() }}"
                class="px-4 py-2 text-white bg-blue-600 rounded-md hover:bg-blue-700">Next</a>
            @else
            <span class="px-4 py-2 text-gray-400 bg-gray-200 rounded-md cursor-not-allowed">Next</span>
            @endif
        </div>
    </div>

</main>