<div>
    <h2 class="text-xl font-bold mb-4">Lịch Sử Mượn Sách Ngày {{ $ngay }}</h2>

    <p class="mb-2"> Tổng số sách đã mượn: <strong>{{ $tong_sach }}</strong></p>

    <table class="table-auto w-full border-collapse border border-gray-300">
        <thead>
            <tr class="bg-gray-200">
                <th class="border px-4 py-2">#</th>
                <th class="border px-4 py-2">Tên Sách</th>
                <th class="border px-4 py-2">Số Lượng</th>
                <th class="border px-4 py-2">Ngày Mượn</th>
                <th class="border px-4 py-2">Ngày Hẹn Trả</th>
                <th class="border px-4 py-2">Tình Trạng</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($phieumuons as $index => $phieumuon)
                <tr class="text-center">
                    <td class="border px-4 py-2">{{ $index + 1 }}</td>
                    <td class="border px-4 py-2">{{ $phieumuon->sach->ten_sach ?? 'N/A' }}</td>
                    <td class="border px-4 py-2">{{ $phieumuon->so_luong }}</td>
                    <td class="border px-4 py-2">{{ $phieumuon->ngay_muon }}</td>
                    <td class="border px-4 py-2">{{ $phieumuon->ngay_hen_tra }}</td>
                    <td class="border px-4 py-2">
                        @if ($phieumuon->tinh_trang == 'da_tra')
                            Đã Trả
                        @elseif ($phieumuon->tinh_trang == 'qua_han')
                            Quá Hạn
                        @else
                            Đang Mượn
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>