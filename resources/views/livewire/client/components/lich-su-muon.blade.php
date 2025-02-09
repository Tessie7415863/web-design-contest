<div class="main">
    @livewire('client.components.header')
    <div class="mt-32 container mx-auto px-4">
        <h2 class="text-2xl font-bold mb-6 text-gray-800 text-center">📖 Lịch Sử Mượn Sách</h2>
        <p class="mb-2">
            Tổng số sách đã mượn: <strong>{{ $tong_sach }}</strong>
        </p>

        <table class="w-full border-collapse border border-gray-300">
            <thead>
                <tr class="bg-gray-200">
                    <th class="border px-4 py-2">#</th>
                    <th class="border px-4 py-2">Tên Sách</th>
                    <th class="border px-4 py-2">Ngày Đặt</th>
                    <th class="border px-4 py-2">Tình Trạng</th>
                    <th class="border px-4 py-2">Email Log</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach ($datSachs as $index => $datSach)
                <tr class="hover:bg-gray-100 text-center">
                    <td class="px-4 py-2">{{ $index + 1 }}</td>
                    <td class="px-4 py-2 font-semibold text-gray-800">
                        {{ $datSach->cuonSach->sach->ten_sach ?? 'N/A' }}
                    </td>
                    <td class="px-4 py-2 text-gray-600">
                        {{ \Carbon\Carbon::parse($datSach->ngay_dat)->format('d/m/Y') }}
                    </td>
                    <td class="px-4 py-2">
                        @if ($datSach->tinh_trang == 'DangDat')
                        <span class="px-3 py-1 text-sm font-medium bg-yellow-100 text-yellow-700 rounded-full">Đang
                            Đặt</span>
                        @elseif ($datSach->tinh_trang == 'DaNhan')
                        <span class="px-3 py-1 text-sm font-medium bg-green-100 text-green-700 rounded-full">Đã
                            Nhận</span>
                        @else
                        <span class="px-3 py-1 text-sm font-medium bg-red-100 text-red-700 rounded-full">Hủy</span>
                        @endif
                    </td>
                    <td class="px-4 py-3 text-center">
                        <a href="https://mailtrap.io/inboxes/3406591" target="_blank"
                            class="text-blue-600 hover:underline">
                            Kiểm tra mail
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>