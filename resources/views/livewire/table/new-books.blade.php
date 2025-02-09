<div class="bg-white shadow-lg rounded-xl p-6 mt-6">
    <!-- Header: tiêu đề và nút điều hướng (nếu cần) -->
    <div class="flex items-center justify-between mb-6">
        <h2 class="text-xl font-bold text-gray-800">
            Sách mới thêm gần đây
        </h2>
        <a href="/admin/manage-sach" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 transition">
            Kiểm tra
        </a>
    </div>

    <!-- Bảng dữ liệu -->
    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">#</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tên Sách
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tác Giả
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Năm Xuất
                        Bản</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Ngày Tạo
                    </th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach($books as $book)
                <tr class="hover:bg-gray-50">
                    <td class="px-6 py-4 whitespace-nowrap">{{ $book->id }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $book->ten_sach }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        {{-- Nếu có quan hệ, sử dụng: --}}
                        {{ $book->tacGia->ho_ten ?? $book->tac_gia_id }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $book->nam_xuat_ban }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $book->created_at->format('d/m/Y') }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>