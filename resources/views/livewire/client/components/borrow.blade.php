<div class="main">
    @livewire('client.components.header')
    <div class="max-w-md mx-auto p-6 bg-white shadow-lg rounded-2xl mt-40">
        <h2 class="text-2xl font-bold text-center mb-4">Mượn sách: {{ $sach->ten_sach }}</h2>
        <p class="text-gray-700 mb-2"><span class="font-semibold">Tác giả:</span>
            {{ $sach->tacGia->ho_ten ?? 'Không rõ' }}
        </p>
        <p class="text-gray-700 mb-4"><span class="font-semibold">Thể loại:</span>
            {{ $sach->theLoai->ten_the_loai ?? 'Không rõ' }}
        </p>

        <form wire:submit.prevent="borrowBook" class="space-y-4">
            <div>
                <label for="ngay_muon" class="block text-gray-600 font-medium mb-1">Ngày mượn:</label>
                <input type="date" id="ngay_muon" wire:model="ngay_muon"
                    class="w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required>
            </div>
            <div>
                <label for="ngay_hen_tra" class="block text-gray-600 font-medium mb-1">Ngày hẹn trả:</label>
                <input type="date" id="ngay_hen_tra" wire:model="ngay_hen_tra"
                    class="w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required>
            </div>
            <button type="submit"
                class="w-full bg-blue-500 text-white font-semibold py-2 px-4 rounded-lg hover:bg-blue-600 transition duration-200">
                Xác nhận mượn
            </button>
        </form>

        @if (session()->has('success'))
        <p class="text-green-600 text-center font-medium mt-4">{{ session('success') }}</p>
        @endif
    </div>

</div>