<div class="bg-white shadow-md rounded-lg p-4 mt-6">
    <h2 class="text-lg font-bold mb-3">Đã thêm sách mới gần đây</h2>

    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border border-gray-200">
            <thead>
                <tr class="bg-gray-100">
                    <th class="border px-4 py-2">#</th>
                    <th class="border px-4 py-2">Tên Sách</th>
                    <th class="border px-4 py-2">Tác Giả</th>
                    <th class="border px-4 py-2">Năm Xuất Bản</th>
                    <th class="border px-4 py-2">Create</th>
                </tr>
            </thead>
            <tbody>
                @foreach($books as $book)
                    <tr class="text-center">
                        <td class="border px-4 py-2">{{ $book->id }}</td>
                        <td class="border px-4 py-2">{{ $book->ten_sach }}</td>
                        <td class="border px-4 py-2">{{ $book->tac_gia_id }}</td>
                        <td class="border px-4 py-2">{{ $book->nam_xuat_ban }}</td>
                        <td class="border px-4 py-2">{{ $book->created_at->format('m-d-Y') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
