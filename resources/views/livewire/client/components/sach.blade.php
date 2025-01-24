<div class="main">
    @livewire('client.components.header')
    <aside id="logo-sidebar"
        class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform -translate-x-full bg-white border-r border-gray-200 sm:translate-x-0 dark:bg-gray-800 dark:border-gray-700"
        aria-label="Sidebar">
        <div class="h-full px-3 pb-4 overflow-y-auto bg-white dark:bg-gray-800">
            <ul class="space-y-2 font-medium">
                <input type="text" wire:model.live="search" placeholder="Nhập tên sách"
                    class="w-full px-4 py-2 mt-2 text-sm text-gray-700 bg-white border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-700 dark:placeholder-gray-500 dark:focus:ring-blue-500 focus:outline-none" />
                <!-- Filter: TacGia -->
                <div class=" shadow-sm">
                    <button
                        class="w-full rounded-xl p-2 hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors duration-200 flex items-center justify-between"
                        wire:click="$toggle('showTacGias')">
                        <span class="text-gray-900 dark:text-white">Tác giả</span>
                        <span>
                            @if ($showTacGias)
                            <i class="fa-solid fa-chevron-up"></i>
                            @else
                            <i class="fa-solid fa-chevron-down"></i>
                            @endif
                        </span>
                    </button>
                    @if ($showTacGias)
                    <div x-data="{ open: @entangle('showTacGias') }" x-show="open"
                        x-transition:enter="transition ease-out duration-300 transform"
                        x-transition:enter-start="opacity-0 scale-y-0" x-transition:enter-end="opacity-100 scale-y-100"
                        x-transition:leave="transition ease-in duration-300 transform"
                        x-transition:leave-start="opacity-100 scale-y-100" x-transition:leave-end="opacity-0 scale-y-0"
                        class="p-4 max-h-48 overflow-y-auto">
                        <ul>
                            @foreach ($tacgias as $tacgia)
                            <li class="flex items-center justify-between mb-2" wire:key={{$tacgia->id}}>
                                <label class="dark:text-white mr-2"
                                    for="tacgia-{{ $tacgia->id }}">{{ $tacgia->ho_ten }}</label>
                                <input type="checkbox" id="tacgia-{{ $tacgia->id }}" wire:model.live="selected_tacgias"
                                    value="{{ $tacgia->id }}" class="w-4 h-4">
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                </div>
                <!-- Filter: NhaXuatBan -->
                <div class="mb-6 shadow-sm">
                    <button
                        class="w-full rounded-xl p-2 hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors duration-200 flex items-center justify-between"
                        wire:click="$toggle('showNhaXuatBans')">
                        <span class="text-gray-900 dark:text-white">Nhà Xuất bản</span>
                        <span>
                            @if ($showNhaXuatBans)
                            <i class="fa-solid fa-chevron-up"></i>
                            @else
                            <i class="fa-solid fa-chevron-down"></i>
                            @endif
                        </span>
                    </button>
                    @if ($showNhaXuatBans)
                    <div x-data="{ open: @entangle('showNhaXuatBans') }" x-show="open"
                        x-transition:enter="transition ease-out duration-300 transform"
                        x-transition:enter-start="opacity-0 scale-y-0" x-transition:enter-end="opacity-100 scale-y-100"
                        x-transition:leave="transition ease-in duration-300 transform"
                        x-transition:leave-start="opacity-100 scale-y-100" x-transition:leave-end="opacity-0 scale-y-0"
                        class="p-4 max-h-48 overflow-y-auto">
                        <ul>
                            @foreach ($nhaxuatbans as $nhaxuatban)
                            <li class="flex items-center justify-between mb-2">
                                <label class="dark:text-white mr-2"
                                    for="nhaxuatban-{{ $nhaxuatban->id }}">{{ $nhaxuatban->ten_nha_xuat_ban }}</label>
                                <input type="checkbox" id="nhaxuatban-{{ $nhaxuatban->id }}"
                                    wire:model.live="selected_nhaxuatbans" value="{{ $nhaxuatban->id }}"
                                    class="w-4 h-4">
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                </div>
                <!-- Filter: mon -->
                <div class="mb-6 shadow-sm">
                    <button
                        class="w-full rounded-xl p-2 hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors duration-200 flex items-center justify-between"
                        wire:click="$toggle('showMons')">
                        <span class="text-gray-900 dark:text-white">Môn</span>
                        <span>
                            @if ($showMons)
                            <i class="fa-solid fa-chevron-up"></i>
                            @else
                            <i class="fa-solid fa-chevron-down"></i>
                            @endif
                        </span>
                    </button>
                    @if ($showMons)
                    <div x-data="{ open: @entangle('showMons') }" x-show="open"
                        x-transition:enter="transition ease-out duration-300 transform"
                        x-transition:enter-start="opacity-0 scale-y-0" x-transition:enter-end="opacity-100 scale-y-100"
                        x-transition:leave="transition ease-in duration-300 transform"
                        x-transition:leave-start="opacity-100 scale-y-100" x-transition:leave-end="opacity-0 scale-y-0"
                        class="p-4 max-h-48 overflow-y-auto">
                        <ul>
                            @foreach ($mons as $mon)
                            <li class="flex items-center justify-between mb-2">
                                <label class="dark:text-white mr-2" for="mon-{{ $mon->id }}">{{ $mon->ten_mon }}</label>
                                <input type="checkbox" id="mon-{{ $mon->id }}" wire:model.live="selected_mons"
                                    value="{{ $mon->id }}" class="w-4 h-4">
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                </div>
                <!-- Filter: khoa -->
                <div class="mb-6 shadow-sm">
                    <button
                        class="w-full rounded-xl p-2 hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors duration-200 flex items-center justify-between"
                        wire:click="$toggle('showKhoas')">
                        <span class="text-gray-900 dark:text-white">Khoa</span>
                        <span>
                            @if ($showKhoas)
                            <i class="fa-solid fa-chevron-up"></i>
                            @else
                            <i class="fa-solid fa-chevron-down"></i>
                            @endif
                        </span>
                    </button>
                    @if ($showKhoas)
                    <div x-data="{ open: @entangle('showKhoas') }" x-show="open"
                        x-transition:enter="transition ease-out duration-300 transform"
                        x-transition:enter-start="opacity-0 scale-y-0" x-transition:enter-end="opacity-100 scale-y-100"
                        x-transition:leave="transition ease-in duration-300 transform"
                        x-transition:leave-start="opacity-100 scale-y-100" x-transition:leave-end="opacity-0 scale-y-0"
                        class="p-4 max-h-48 overflow-y-auto">
                        <ul>
                            @foreach ($khoas as $khoa)
                            <li class="flex items-center justify-between mb-2">
                                <label class="dark:text-white mr-2"
                                    for="khoa-{{ $khoa->id }}">{{ $khoa->ten_khoa }}</label>
                                <input type="checkbox" id="khoa-{{ $khoa->id }}" wire:model.live="selected_khoas"
                                    value="{{ $khoa->id }}" class="w-4 h-4">
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                </div>
                <!-- Filter: Nganh -->
                <div class="mb-6 shadow-sm">
                    <button
                        class="w-full rounded-xl p-2 hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors duration-200 flex items-center justify-between"
                        wire:click="$toggle('showNganhs')">
                        <span class="text-gray-900 dark:text-white">Ngành</span>
                        <span>
                            @if ($showNganhs)
                            <i class="fa-solid fa-chevron-up"></i>
                            @else
                            <i class="fa-solid fa-chevron-down"></i>
                            @endif
                        </span>
                    </button>
                    @if ($showNganhs)
                    <div x-data="{ open: @entangle('showNganhs') }" x-show="open"
                        x-transition:enter="transition ease-out duration-300 transform"
                        x-transition:enter-start="opacity-0 scale-y-0" x-transition:enter-end="opacity-100 scale-y-100"
                        x-transition:leave="transition ease-in duration-300 transform"
                        x-transition:leave-start="opacity-100 scale-y-100" x-transition:leave-end="opacity-0 scale-y-0"
                        class="p-4 max-h-48 overflow-y-auto">
                        <ul>
                            @foreach ($nganhs as $nganh)
                            <li class="flex items-center justify-between mb-2">
                                <label class="dark:text-white mr-2"
                                    for="nganh-{{ $nganh->id }}">{{ $nganh->ten_nganh }}</label>
                                <input type="checkbox" id="nganh-{{ $nganh->id }}" wire:model.live="selected_nganhs"
                                    value="{{ $nganh->id }}" class="w-4 h-4">
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                </div>
                <!-- Filter: The loai -->
                <div class="mb-6 shadow-sm">
                    <button
                        class="w-full rounded-xl p-2 hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors duration-200 flex items-center justify-between"
                        wire:click="$toggle('showTheLoais')">
                        <span class="text-gray-900 dark:text-white">Thể loại</span>
                        <span>
                            @if ($showTheLoais)
                            <i class="fa-solid fa-chevron-up"></i>
                            @else
                            <i class="fa-solid fa-chevron-down"></i>
                            @endif
                        </span>
                    </button>
                    @if ($showTheLoais)
                    <div x-data="{ open: @entangle('showTheLoais') }" x-show="open"
                        x-transition:enter="transition ease-out duration-300 transform"
                        x-transition:enter-start="opacity-0 scale-y-0" x-transition:enter-end="opacity-100 scale-y-100"
                        x-transition:leave="transition ease-in duration-300 transform"
                        x-transition:leave-start="opacity-100 scale-y-100" x-transition:leave-end="opacity-0 scale-y-0"
                        class="p-4 max-h-48 overflow-y-auto">
                        <ul>
                            @foreach ($theloais as $theloai)
                            <li class="flex items-center justify-between mb-2">
                                <label class="dark:text-white mr-2"
                                    for="theloai-{{ $theloai->id }}">{{ $theloai->ten_the_loai }}</label>
                                <input type="checkbox" id="theloai-{{ $theloai->id }}"
                                    wire:model.live="selected_theloais" value="{{ $theloai->id }}" class="w-4 h-4">
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                </div>
                <!-- Filter: Năm -->
                <div class="mb-6 shadow-sm">
                    <button
                        class="w-full rounded-xl p-2 hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors duration-200 flex items-center justify-between"
                        wire:click="$toggle('showNams')">
                        <span class="text-gray-900 dark:text-white">Năm xuất bản</span>
                        <span>
                            @if ($showNams)
                            <i class="fa-solid fa-chevron-up"></i>
                            @else
                            <i class="fa-solid fa-chevron-down"></i>
                            @endif
                        </span>
                    </button>
                    @if ($showNams)
                    <div x-data="{ open: @entangle('showNams') }" x-show="open"
                        x-transition:enter="transition ease-out duration-300 transform"
                        x-transition:enter-start="opacity-0 scale-y-0" x-transition:enter-end="opacity-100 scale-y-100"
                        x-transition:leave="transition ease-in duration-300 transform"
                        x-transition:leave-start="opacity-100 scale-y-100" x-transition:leave-end="opacity-0 scale-y-0"
                        class="p-4 max-h-48 overflow-y-auto">
                        <div class="flex flex-col space-y-4">
                            <div class="flex flex-col items-center justify-between space-x-4">
                                <!-- Năm bắt đầu -->
                                <div class="flex flex-col items-center">
                                    <label for="start-year" class="text-sm text-gray-700 dark:text-gray-300">Năm bắt
                                        đầu</label>
                                    <input type="range" id="start-year" wire:model.live="start_year"
                                        min="{{ min($nams) }}" max="{{ max($nams) }}" step="1"
                                        class="w-36 h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer dark:bg-gray-700 accent-blue-500" />
                                    <span class="text-sm text-gray-700 dark:text-gray-300">{{ $start_year }}</span>
                                </div>

                                <!-- Năm kết thúc -->
                                <div class="flex flex-col items-center">
                                    <label for="end-year" class="text-sm text-gray-700 dark:text-gray-300">Năm kết
                                        thúc</label>
                                    <input type="range" id="end-year" wire:model.live="end_year" min="{{ min($nams) }}"
                                        max="{{ max($nams) }}" step="1"
                                        class="w-36 h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer dark:bg-gray-700 accent-blue-500" />
                                    <span class="text-sm text-gray-700 dark:text-gray-300">{{ $end_year }}</span>
                                </div>
                            </div>

                            <div class="mt-4">
                                <p class="text-sm text-gray-600 dark:text-gray-400">
                                    Phạm vi năm:
                                    <span class="font-semibold">{{ $start_year }} - {{ $end_year }}</span>
                                </p>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
            </ul>
        </div>
    </aside>
    <div class="p-4 sm:ml-64">
        <div class="p-2 border-2 border-gray-200 rounded-lg dark:border-gray-700 mt-16">
            <div class="px-2">
                <div class="items-center justify-between px-2 py-2 bg-gray-100 dark:bg-gray-900 ">
                    <div class="flex items-center justify-between">
                        <div class="relative pb-1">
                            <select wire:model.live="sort"
                                class="block w-56 px-4 py-2 text-base bg-white border border-gray-300 rounded-lg shadow-sm appearance-none focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-900 dark:border-gray-700 dark:focus:ring-blue-500 dark:text-gray-400 cursor-pointer">
                                <option value="latest">Sắp xếp theo mới nhất</option>
                                <option value="oldest">Sắp xếp theo cũ nhất</option>
                            </select>
                            <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                                <svg class="w-4 h-4 text-gray-400 dark:text-gray-500" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7" />
                                </svg>
                            </div>
                        </div>
                    </div>
                    <div class="w-full overflow-y-auto min-h-[74vh] max-h-[74vh]">
                        <div class="w-full overflow-y-auto overflow-x-hidden">
                            @foreach($sachs as $sach)
                            <div
                                class="bg-white dark:bg-gray-800 rounded-xl overflow-hidden shadow-lg hover:shadow-xl transition-all duration-300 group mb-4">
                                <div class="p-4 flex flex-row justify-between">
                                    <div>
                                        <h3 class="font-semibold mb-2 line-clamp-2 text-gray-900 dark:text-white">
                                            {{ $sach->ten_sach }}
                                        </h3>
                                        <p class="text-sm text-gray-600 dark:text-gray-400 mb-2">Tác giả:
                                            {{ $sach->tacGia->ho_ten ?? 'Không rõ' }}
                                        </p>
                                        <p class="text-sm text-gray-600 dark:text-gray-400 mb-2">Thể loại:
                                            {{ $sach->theLoai->ten_the_loai ?? 'Không rõ' }}
                                        </p>
                                        <span class="text-sm text-gray-500 dark:text-gray-400">Năm xuất bản:
                                            {{ $sach->nam_xuat_ban }}</span>
                                    </div>
                                    <div
                                        class="flex flex-col gap-5 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                        <button wire:click="borrowsach({{ $sach->id }})"
                                            class="bg-blue-600 px-4 py-2 rounded-full text-sm text-white hover:bg-blue-700 transition-colors">
                                            Mượn ngay
                                        </button>
                                        <button wire:click="showSachDetails({{ $sach->id }})"
                                            class="bg-blue-600 px-4 py-2 rounded-full text-sm text-white hover:bg-blue-700 transition-colors">
                                            Chi tiết
                                        </button>
                                    </div>
                                </div>
                            </div>
                            @endforeach

                            <!-- Modal -->
                            @if($showModal)
                            <div
                                class="fixed inset-0 bg-black/50 backdrop-blur-sm z-50 flex items-center justify-center">
                                <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg p-6 w-full max-w-md">
                                    <div class="flex justify-between items-center mb-4">
                                        <h2 class="text-lg font-bold text-gray-900 dark:text-white">Chi tiết sách</h2>
                                        <button wire:click="closeModal"
                                            class="text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M6 18L18 6M6 6l12 12" />
                                            </svg>
                                        </button>
                                    </div>
                                    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-6 space-y-6">
                                        @if($selectedBook)
                                        <div class="border-b pb-4 mb-4">
                                            <h2 class="text-lg font-semibold text-gray-800 dark:text-gray-200">Thông tin
                                                Sách
                                            </h2>
                                            <div class="mt-2 text-gray-700 dark:text-gray-300 space-y-2">
                                                <p><strong class="text-gray-900 dark:text-gray-100">Tên sách:</strong>
                                                    {{ $selectedBook->ten_sach }}
                                                </p>
                                                <p><strong class="text-gray-900 dark:text-gray-100">Tác giả:</strong>
                                                    {{ $selectedBook->tacGia->ho_ten ?? 'Không rõ' }}
                                                </p>
                                                <p><strong class="text-gray-900 dark:text-gray-100">Nhà xuất
                                                        bản:</strong>
                                                    {{ $selectedBook->nhaXuatBan->ten_nha_xuat_ban ?? 'Không rõ' }}
                                                </p>
                                                <p><strong class="text-gray-900 dark:text-gray-100">Năm xuất
                                                        bản:</strong>
                                                    {{ $selectedBook->nam_xuat_ban }}
                                                </p>
                                                <p><strong class="text-gray-900 dark:text-gray-100">Thể loại:</strong>
                                                    {{ $selectedBook->theLoai->ten_the_loai ?? 'Không rõ' }}
                                                </p>
                                                <p><strong class="text-gray-900 dark:text-gray-100">Số trang:</strong>
                                                    {{ $selectedBook->so_trang }}
                                                </p>
                                            </div>
                                        </div>
                                        @endif
                                        @if($selectedSachDetails)
                                        <div>
                                            <h2 class="text-lg font-semibold text-gray-800 dark:text-gray-200">Chi tiết
                                                Sách
                                                trong Thư viện</h2>
                                            <div class="mt-2 text-gray-700 dark:text-gray-300 space-y-2">
                                                <p>
                                                    <strong class="text-gray-900 dark:text-gray-100">Vị trí trong thư
                                                        viện:</strong>
                                                    {{ $selectedSachDetails->viTriSach->khu_vuc }},
                                                    {{ $selectedSachDetails->viTriSach->tuong }},
                                                    {{ $selectedSachDetails->viTriSach->ke }}
                                                </p>
                                                <p>
                                                    <strong class="text-gray-900 dark:text-gray-100">Tình
                                                        trạng:</strong>
                                                    {{ $selectedSachDetails->tinh_trang }}
                                                </p>
                                            </div>
                                        </div>
                                        @else
                                        <h2 class="text-lg font-semibold text-gray-800 dark:text-gray-200">Sách này
                                            không có trong thư viện</h2>
                                        @endif
                                    </div>

                                    <div class="mt-4 text-right">
                                        <button wire:click="closeModal"
                                            class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                                            Đóng
                                        </button>
                                    </div>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- main -->
    <div class="flex justify-center mt-2">
        <div class="inline-flex items-center space-x-2">
            <!-- Previous Page Button -->
            @if($sachs->onFirstPage())
            <span
                class="px-4 py-2 text-gray-400 bg-gray-200 dark:bg-gray-700 dark:text-gray-500 rounded-md cursor-not-allowed">Previous</span>
            @else
            <a href="{{ $sachs->previousPageUrl() }}"
                class="px-4 py-2 text-white bg-blue-600 rounded-md hover:bg-blue-700 dark:bg-blue-500 dark:hover:bg-blue-600">Previous</a>
            @endif

            <!-- Page Numbers -->
            @foreach ($sachs->getUrlRange(1, $sachs->lastPage()) as $page => $url)
            @if ($page == $sachs->currentPage())
            <span class="px-4 py-2 text-white bg-blue-600 dark:bg-blue-500 rounded-md">{{ $page }}</span>
            @else
            <a href="{{ $url }}"
                class="px-4 py-2 text-blue-600 border border-gray-300 rounded-md hover:bg-gray-100 dark:text-blue-400 dark:border-gray-600 dark:hover:bg-gray-700">{{ $page }}</a>
            @endif
            @endforeach

            <!-- Next Page Button -->
            @if($sachs->hasMorePages())
            <a href="{{ $sachs->nextPageUrl() }}"
                class="px-4 py-2 text-white bg-blue-600 rounded-md hover:bg-blue-700 dark:bg-blue-500 dark:hover:bg-blue-600">Next</a>
            @else
            <span
                class="px-4 py-2 text-gray-400 bg-gray-200 dark:bg-gray-700 dark:text-gray-500 rounded-md cursor-not-allowed">Next</span>
            @endif
        </div>
    </div>

</div>