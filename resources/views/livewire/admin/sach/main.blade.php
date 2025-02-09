<!-- Main Section -->
<main class="flex-1 overflow-y-auto p-6">
    <h1 class="text-center font-bold text-2xl mb-6">Quản Lý Sách</h1>

    <!-- Button Tạo Sách Mới -->
    <div class="mb-4 text-left">
        <button wire:click="openModal" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700">
            Tạo sách mới
        </button>
    </div>

    <!-- Bảng Quản Lý Sách -->
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
                    <th class="border border-gray-300 px-4 py-2">Ảnh bìa</th>
                    <th class="border border-gray-300 px-4 py-2">Tên Sách</th>
                    <th class="border border-gray-300 px-4 py-2">ID Tác Giả</th>
                    <th class="border border-gray-300 px-4 py-2">ID NXB</th>
                    <th class="border border-gray-300 px-4 py-2">ID Thể Loại</th>
                    <th class="border border-gray-300 px-4 py-2">Năm Xuất Bản</th>
                    <th class="border border-gray-300 px-4 py-2">Số Trang</th>
                    <th class="border border-gray-300 px-4 py-2">ISBN</th>
                    <th class="border border-gray-300 px-4 py-2">ID Môn</th>
                    <th class="border border-gray-300 px-4 py-2">ID Ngành</th>
                    <th class="border border-gray-300 px-4 py-2">ID Khoa</th>
                    <th class="border border-gray-300 px-4 py-2">Hành động</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($sachs as $sach)
                <tr class="hover:bg-gray-100">
                    <td class="border border-gray-300 px-4 py-2 text-center">{{ $sach->id }}</td>
                    <td class="border border-gray-300 px-4 py-2 text-center"><img
                            src="{{ asset('storage/' . $sach->anh_bia) }}" alt="Ảnh bìa" width="50"></td>
                    <td class="border border-gray-300 px-4 py-2 text-center">{{ $sach->ten_sach }}</td>
                    <td class="border border-gray-300 px-4 py-2 text-center">{{ $sach->tacgia->ho_ten }}</td>
                    <td class="border border-gray-300 px-4 py-2 text-center">{{ $sach->nhaxuatban->ten_nha_xuat_ban }}
                    </td>
                    <td class="border border-gray-300 px-4 py-2 text-center">{{ $sach->theloai->ten_the_loai }}</td>
                    <td class="border border-gray-300 px-4 py-2 text-center">{{ $sach->nam_xuat_ban }}</td>
                    <td class="border border-gray-300 px-4 py-2 text-center">{{ $sach->so_trang }}</td>
                    <td class="border border-gray-300 px-4 py-2 text-center">{{ $sach->isbn }}</td>
                    <td class="border border-gray-300 px-4 py-2 text-center">{{ $sach->mon->ten_mon }}</td>
                    <td class="border border-gray-300 px-4 py-2 text-center">{{ $sach->nganh->ten_nganh }}</td>
                    <td class="border border-gray-300 px-4 py-2 text-center">{{ $sach->khoa->ten_khoa }}</td>
                    <td class="border border-gray-300 px-4 py-2 flex justify-center space-x-2">
                        <button wire:click="editSach({{ $sach->id }})"
                            class="bg-yellow-500 text-white px-3 py-1 rounded-md hover:bg-yellow-600">
                            Sửa
                        </button>
                        <button wire:click="openConfirmModal({{ $sach->id }})"
                            class="bg-red-600 text-white px-3 py-1 rounded-md hover:bg-red-700">
                            Xoá
                        </button>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="12" class="border border-gray-300 px-4 py-2 text-center">Không có dữ liệu sách.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- modal -->
    <div x-data="{ open: @entangle('isModalOpen') }" x-show="open"
        class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50">
        <div class="bg-white rounded-lg shadow-lg p-6 w-1/3">
            <div class="flex justify-between">
                <h2 class="text-xl font-bold mb-4">
                    {{ $isEditMode ? 'Cập nhật sách' : 'Tạo sách mới' }}
                </h2>
                <button type="button" wire:click="closeModal"
                    class="w-10 h-10 bg-gray-500 text-white text-xl rounded-full flex items-center justify-center hover:bg-gray-600 focus:outline-none transition-transform transform hover:scale-110">
                    X
                </button>
            </div>
            <!-- Form -->
            <form wire:submit.prevent="{{ $isEditMode ? 'updateSach' : 'createSach' }}"
                class="flex flex-col gap-4 h-auto w-auto overflow-auto" enctype="multipart/form-data">
                <div class="flex justify-center align-middle gap-4">
                    <div>
                        <div class="mb-4">
                            <label for="ten_sach" class="block font-semibold">Tên Sách</label>
                            <input type="text" id="ten_sach" wire:model.defer="ten_sach"
                                class="w-full border border-gray-300 rounded-md px-3 py-2">
                            @error('ten_sach') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-4">
                            <label for="anh_bia" class="block font-semibold">Ảnh bìa sách</label>
                            <input type="file" accept="image/*" id="anh_bia" wire:model="anh_bia"
                                class="w-full border border-gray-300 rounded-md px-3 py-2">
                        </div>

                        <div class="mb-4">
                            <label for="tac_gia_id" class="block font-semibold">Tác Giả</label>
                            <select id="tac_gia_id" wire:model.defer="tac_gia_id"
                                class="w-full border border-gray-300 rounded-md px-3 py-2">
                                <option value="">-- Chọn tác giả --</option>
                                @foreach($tacgias as $tacgia)
                                <option value="{{ $tacgia->id }}">{{ $tacgia->ho_ten }}</option>
                                @endforeach
                            </select>
                            @error('tac_gia_id') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                        </div>

                        <div class="mb-4">
                            <label for="nha_xuat_ban_id" class="block font-semibold">NXB</label>
                            <select id="nha_xuat_ban_id" wire:model.defer="nha_xuat_ban_id"
                                class="w-full border border-gray-300 rounded-md px-3 py-2">
                                <option value="">-- Chọn nhà xuất bản --</option>
                                @foreach($nhaxuatbans as $nhaxuatban)

                                <option value="{{ $nhaxuatban->id }}">{{ $nhaxuatban->ten_nha_xuat_ban }}</option>
                                @endforeach
                            </select>
                            @error('nha_xuat_ban_id') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                        </div>

                        <div class="mb-4">
                            <label for="the_loai_id" class="block font-semibold">Thể Loại</label>
                            <select id="the_loai_id" wire:model.defer="the_loai_id"
                                class="w-full border border-gray-300 rounded-md px-3 py-2">
                                <option value="">-- Chọn thể loại --</option>
                                @foreach($theloais as $theloai)
                                <option value="{{ $theloai->id }}">{{ $theloai->ten_the_loai }}</option>
                                @endforeach
                            </select>
                            @error('the_loai_id') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                        </div>

                        <div class="mb-4">
                            <label for="nam_xuat_ban" class="block font-semibold">Năm Xuất Bản</label>
                            <input type="text" id="nam_xuat_ban" wire:model.defer="nam_xuat_ban"
                                class="w-full border border-gray-300 rounded-md px-3 py-2">
                            @error('nam_xuat_ban') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <div>
                        <div class="mb-4">
                            <label for="so_trang" class="block font-semibold">Số Trang</label>
                            <input type="text" id="so_trang" wire:model.defer="so_trang"
                                class="w-full border border-gray-300 rounded-md px-3 py-2">
                            @error('so_trang') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-4">
                            @if ($anh_bia)
                            @if (is_object($anh_bia))
                            <img src="{{ $anh_bia->temporaryUrl() }}" width="100">
                            @else
                            <img src="{{ asset('storage/' . $anh_bia) }}" width="100">
                            @endif
                            @endif
                            @error('anh_bia')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="isbn" class="block font-semibold">ISBN</label>
                            <input type="text" id="isbn" wire:model.defer="isbn"
                                class="w-full border border-gray-300 rounded-md px-3 py-2">
                            @error('isbn') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                        </div>

                        <div class="mb-4">
                            <label for="mon_hoc_id" class="block font-semibold">Môn</label>
                            <select id="mon_hoc_id" wire:model.defer="mon_hoc_id"
                                class="w-full border border-gray-300 rounded-md px-3 py-2">
                                <option value="">-- Chọn môn --</option>
                                @foreach($monhocs as $monhoc)
                                <option value="{{ $monhoc->id }}">{{ $monhoc->ten_mon }}</option>
                                @endforeach
                            </select>
                            @error('mon_hoc_id') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                        </div>

                        <div class="mb-4">
                            <label for="nganh_id" class="block font-semibold">Ngành</label>
                            <select id="nganh_id" wire:model.defer="nganh_id"
                                class="w-full border border-gray-300 rounded-md px-3 py-2">
                                <option value="">-- Chọn ngành --</option>
                                @foreach($nganhs as $nganh)
                                <option value="{{ $nganh->id }}">{{ $nganh->ten_nganh }}</option>
                                @endforeach
                            </select>
                            @error('nganh_id') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                        </div>

                        <div class="mb-4">
                            <label for="khoa_id" class="block font-semibold">Khoa</label>
                            <select id="khoa_id" wire:model.defer="khoa_id"
                                class="w-full border border-gray-300 rounded-md px-3 py-2">
                                <option value="">-- Chọn khoa --</option>
                                @foreach($khoas as $khoa)
                                <option value="{{ $khoa->id }}">{{ $khoa->ten_khoa }}</option>
                                @endforeach
                            </select>
                            @error('khoa_id') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                        </div>
                    </div>
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
            <p class="text-center mb-6">Bạn có chắc chắn muốn xóa sách này không?
            </p>
            <p class="text-center mb-6">Thao tác này không thể hoàn
                tác.
            </p>
            <div class="flex justify-center space-x-4">
                <button type="button" wire:click="closeConfirmModal"
                    class="bg-gray-500 text-white px-4 py-2 rounded-md hover:bg-gray-600">Huỷ</button>
                <button type="button" wire:click="deleteSach"
                    class="bg-red-600 text-white px-4 py-2 rounded-md hover:bg-red-700">Xóa</button>
            </div>
        </div>
    </div>
    <div class="flex justify-center mt-6">
        <div class="inline-flex items-center space-x-2">
            <!-- Previous Page Button -->
            @if($sachs->onFirstPage())
            <span class="px-4 py-2 text-gray-400 bg-gray-200 rounded-md cursor-not-allowed">Previous</span>
            @else
            <a href="{{ $sachs->previousPageUrl() }}"
                class="px-4 py-2 text-white bg-blue-600 rounded-md hover:bg-blue-700">Previous</a>
            @endif

            <!-- Page Numbers -->
            @foreach ($sachs->getUrlRange(1, $sachs->lastPage()) as $page => $url)

            <a wire:click.prevent="gotoPage({{ $page }})" href="#"
                class="{{ $page == $sachs->currentPage() ? 'bg-blue-600 text-white' : 'text-blue-600 border border-gray-300 hover:bg-gray-100' }} px-4 py-2 rounded-md">
                {{ $page }}
            </a>
            @endforeach

            <!-- Next Page Button -->
            @if($sachs->hasMorePages())
            <a href="{{ $sachs->nextPageUrl() }}"
                class="px-4 py-2 text-white bg-blue-600 rounded-md hover:bg-blue-700">Next</a>
            @else
            <span class="px-4 py-2 text-gray-400 bg-gray-200 rounded-md cursor-not-allowed">Next</span>
            @endif
        </div>
    </div>

</main>