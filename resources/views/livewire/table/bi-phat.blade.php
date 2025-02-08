<div class="bg-white shadow-md rounded-lg p-4 mt-6">
    <h2 class="text-lg font-bold mb-3">Danh sách sinh viên bị phạt</h2>

    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border border-gray-200">
            <thead>
                <tr class="bg-gray-100">
                    <th class="border px-4 py-2">#</th>
                    <th class="border px-4 py-2">Sinh Viên</th>
                    <th class="border px-4 py-2">Tên Sách</th>
                    <th class="border px-4 py-2">Ngày Trả</th>
                    <th class="border px-4 py-2">Lý Do</th>
                    <th class="border px-4 py-2">Số Tiền</th>
                </tr>
            </thead>
            <tbody>
                @foreach($biphats as $biphat)
                    <tr class="text-center">
                        <td class="border px-4 py-2">{{ $biphat->id }}</td>
                        <td class="border px-4 py-2">{{ $biphat->sinhvien->ho_ten ?? 'Không có dữ liệu' }}</td>
                        <td class="border px-4 py-2">{{ $biphat->sach->ten_sach ?? 'Không có dữ liệu' }}</td>
                        <td class="border px-4 py-2">{{ $biphat->phieutra->ngay_tra ?? 'Không có dữ liệu' }}</td>
                        <td class="border px-4 py-2">{{ $biphat->ly_do }}</td>
                        <td class="border px-4 py-2">{{ number_format($biphat->so_tien, 0, ',', '.') }} VND</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>