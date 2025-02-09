<div class="bg-white shadow-lg rounded-xl p-6 mt-6">
    <!-- Header: tiêu đề và nút điều hướng -->
    <div class="flex items-center justify-between mb-6">
        <h2 class="text-xl font-bold text-gray-800">
            Danh sách sinh viên bị phạt
        </h2>
        <a href="/admin/manage-phat" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 transition">
            Kiểm tra
        </a>
    </div>

    <!-- Bảng dữ liệu -->
    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">#</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Sinh Viên
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tên Sách
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Ngày Trả
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Lý Do
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Số Tiền
                    </th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach($biphats as $biphat)
                <tr class="hover:bg-gray-50">
                    <td class="px-6 py-4 whitespace-nowrap">{{ $biphat->id }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        {{ $biphat->sinhvien->ho_ten ?? 'Không có dữ liệu' }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        {{ $biphat->sach->ten_sach ?? 'Không có dữ liệu' }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        @if($biphat->phieutra && $biphat->phieutra->ngay_tra)
                        {{ \Carbon\Carbon::parse($biphat->phieutra->ngay_tra)->format('d/m/Y') }}
                        @else
                        Không có dữ liệu
                        @endif
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $biphat->ly_do }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        {{ number_format($biphat->so_tien, 0, ',', '.') }} VND
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>