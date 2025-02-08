<main class="flex-1 overflow-y-auto p-6">
    <h1 class="text-center font-bold text-2xl mb-6">Thống Kê</h1>

    <div class="mb-4 flex items-center justify-center">
        <input type="date" id="ngay" wire:model="ngay" class="w-full border border-gray-300 rounded-md px-3 py-2">
        @error('ngay') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
    </div>

    <!-- Bảng hiển thị kết quả -->
    <table class="table-auto w-full border-collapse border border-gray-300 mt-4">
        <thead class="bg-gray-100">
            <tr>
                <th class="border border-gray-300 px-4 py-2">ID</th>
                <th class="border border-gray-300 px-4 py-2">Tên Sinh Viên</th>
                <th class="border border-gray-300 px-4 py-2">Ngày Mượn</th>
                <th class="border border-gray-300 px-4 py-2">Tên Sách</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($phieumuon as $pm)
                <tr class="hover:bg-gray-100">
                    <td class="border border-gray-300 px-4 py-2 text-center">{{ $pm->id }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $pm->sinhvien->ho_ten }}</td>
                    <td class="border border-gray-300 px-4 py-2 text-center">{{ $pm->ngay_muon }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $pm->sach->ten_sach }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center py-4">Không có dữ liệu</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</main>