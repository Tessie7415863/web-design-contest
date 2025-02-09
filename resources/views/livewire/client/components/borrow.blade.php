<div class="min-h-screen overflow-hidden">
    @livewire('client.components.header')

    <div class="container mx-auto mt-32  rounded-2xl">
        <div class="flex flex-col md:flex-row bg-white shadow-2xl rounded-2xl overflow-hidden">
            <!-- Bên trái: Hình ảnh sách -->
            <div class="md:w-1/2 relative">
                @if($sach->anh_bia)
                <img src="{{ asset('storage/' . $sach->anh_bia) }}" alt="{{ $sach->ten_sach }}"
                    class="w-full h-full object-cover">
                @else
                <img src="https://placehold.co/750x750?text={{ urlencode($sach->ten_sach) }}"
                    alt="{{ $sach->ten_sach }}" class="w-full h-full object-cover">
                @endif
                <!-- Có thể thêm overlay nếu muốn hiển thị tiêu đề sách ngay trên ảnh -->
                <div class="absolute inset-0 bg-black opacity-25"></div>
            </div>

            <!-- Bên phải: Form mượn sách -->
            <div class="md:w-1/2 p-8 flex flex-col justify-center">
                <h2 class="text-3xl font-extrabold text-gray-800 text-center mb-6">
                    Mượn sách: {{ $sach->ten_sach }}
                </h2>
                <div class="mb-6 text-center">
                    <p class="text-gray-700">
                        <span class="font-semibold">Tác giả:</span> {{ $sach->tacGia->ho_ten ?? 'Không rõ' }}
                    </p>
                    <p class="text-gray-700">
                        <span class="font-semibold">Thể loại:</span> {{ $sach->theLoai->ten_the_loai ?? 'Không rõ' }}
                    </p>
                </div>

                <!-- Form mượn sách -->
                <form wire:submit.prevent="borrowBook" class="space-y-6">
                    <div>
                        <label for="ngay_muon" class="block text-sm font-medium text-gray-700">Ngày mượn:</label>
                        <input type="date" id="ngay_muon" wire:model="ngay_muon" required
                            class="mt-1 block w-full rounded-2xl border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                    </div>
                    <div>
                        <label for="ngay_hen_tra" class="block text-sm font-medium text-gray-700">Ngày hẹn trả:</label>
                        <input type="date" id="ngay_hen_tra" wire:model="ngay_hen_tra" required
                            class="mt-1 block w-full rounded-2xl border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                    </div>
                    <button type="submit"
                        class="w-full py-3 px-4 bg-blue-600 text-white rounded-2xl font-semibold transition-colors hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <!-- Hiển thị nội dung khi không loading -->
                        <span wire:loading.remove wire:target="borrowBook">Mượn sách</span>
                        <!-- Nội dung hiển thị khi loading -->
                        <span wire:loading wire:target="borrowBook">Đang xử lý...</span>
                    </button>
                </form>

                <!-- Liên kết quay lại danh sách sách -->
                <div class="mt-6 text-center">
                    <a href="{{ route('sach') }}" class="text-blue-600 hover:underline">
                        &larr; Quay lại danh sách sách
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>