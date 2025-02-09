<div class=" bg-gray-100 overflow-hidden">
    @livewire('client.components.header')

    <div class="container mx-auto px-4 p-2 mt-32">
        <div class="bg-white shadow-lg rounded-lg overflow-hidden flex flex-col md:flex-row p-2">
            <!-- Bên trái: Hiển thị ảnh bìa lớn -->
            <div class="md:w-1/2">
                @if($sach->anh_bia)
                <img src="{{ asset('storage/' . $sach->anh_bia) }}" alt="{{ $sach->ten_sach }}"
                    class="w-full h-full object-cover">
                @else
                <img src="https://placehold.co/750x750?text={{$sach->ten_sach}}" alt="{{ $sach->ten_sach }}"
                    class="w-full h-full object-cover">
                @endif
            </div>


            <!-- Bên phải: Thông tin chi tiết sách -->
            <div class="md:w-1/2 p-8 flex flex-col justify-between">
                <div>
                    <h1 class="text-3xl font-bold text-gray-900">{{ $sach->ten_sach }}</h1>
                    <p class="mt-3 text-gray-600">
                        <span class="font-semibold">Tác giả:</span> {{ $sach->tacGia->ho_ten ?? 'Không rõ' }}
                    </p>
                    <p class="mt-1 text-gray-600">
                        <span class="font-semibold">Thể loại:</span> {{ $sach->theLoai->ten_the_loai ?? 'Không rõ' }}
                    </p>
                    <p class="mt-1 text-gray-600">
                        <span class="font-semibold">Nhà xuất bản:</span>
                        {{ $sach->nhaXuatBan->ten_nha_xuat_ban ?? 'Không rõ' }}
                    </p>
                    <p class="mt-1 text-gray-600">
                        <span class="font-semibold">Năm xuất bản:</span> {{ $sach->nam_xuat_ban ?? 'Không rõ' }}
                    </p>
                    <p class="mt-1 text-gray-600">
                        <span class="font-semibold">Số trang:</span> {{ $sach->so_trang ?? 'Không rõ' }}
                    </p>
                    <p class="mt-1 text-gray-600">
                        <span class="font-semibold">ISBN:</span> {{ $sach->isbn ?? 'Không có' }}
                    </p>
                    <p class="mt-1 text-gray-600">
                        <span class="font-semibold">Môn học:</span> {{ $sach->mon->ten_mon ?? 'Không rõ' }}
                    </p>
                    <p class="mt-1 text-gray-600">
                        <span class="font-semibold">Ngành:</span> {{ $sach->nganh->ten_nganh ?? 'Không rõ' }}
                    </p>
                    <p class="mt-1 text-gray-600">
                        <span class="font-semibold">Khoa:</span> {{ $sach->khoa->ten_khoa ?? 'Không rõ' }}
                    </p>

                    <!-- Thông tin chi tiết sách trong thư viện -->
                    @if($selectedSachDetails)
                    <div class="mt-6 border-t pt-4">
                        <h2 class="text-xl font-semibold text-gray-800">Chi tiết Sách trong Thư viện</h2>
                        <div class="mt-2 text-gray-700 text-sm">
                            <p>
                                <span class="font-semibold">Vị trí:</span>
                                {{ $selectedSachDetails->viTriSach->khu_vuc }},
                                {{ $selectedSachDetails->viTriSach->tuong }},
                                {{ $selectedSachDetails->viTriSach->ke }}
                            </p>
                            <p>
                                <span class="font-semibold">Tình trạng:</span>
                                {{ $selectedSachDetails->tinh_trang }}
                            </p>
                        </div>
                    </div>
                    @else
                    <div class="mt-6 border-t pt-4">
                        <h2 class="text-xl font-semibold text-gray-800">Sách này không có trong thư viện</h2>
                    </div>
                    @endif
                </div>

                <!-- Nút quay lại -->
                <div class="mt-6">
                    <a href="{{ route('sach') }}"
                        class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-6 rounded-lg transition duration-200">
                        <i class="fas fa-arrow-left mr-2"></i> Quay lại
                    </a>
                    @if(Auth::guard('sinhvien')->check() || Auth::guard('web')->check())
                    <button wire:click="borrowSach({{ $sach->id }})"
                        class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-6 rounded-lg transition duration-200">
                        Mượn ngay
                    </button>
                    @else
                    <button wire:click="alert"
                        class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-6 rounded-lg transition duration-200 cursor-not-allowed">
                        Mượn ngay
                    </button>
                    @endauth

                </div>
            </div>
        </div>
    </div>
</div>