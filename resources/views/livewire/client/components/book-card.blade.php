<div>
    @foreach($books as $book)
        <div class="bg-white rounded-xl overflow-hidden shadow-lg hover:shadow-xl transition-all duration-300 group">
            <div class="relative">
                <img src="{{ $book->cover_image }}" alt="{{ $book->ten_sach }}"
                    class="w-full h-48 object-cover transition-transform duration-300 group-hover:scale-105">
                <div
                    class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                    <div class="absolute bottom-4 left-4 right-4 flex justify-between items-center">
                        <button wire:click="borrowBook({{ $book->id }})"
                            class="bg-blue-600 px-4 py-2 rounded-full text-sm text-white hover:bg-blue-700 transition-colors">
                            Mượn ngay
                        </button>
                        <button wire:click="showBookDetails({{ $book->id }})"
                            class="bg-white/20 backdrop-blur-sm px-3 py-2 rounded-full text-sm text-white hover:bg-white/30 transition-colors">
                            Chi tiết
                        </button>
                        <div>
                            <!-- Modal -->
                            @if($showModal)
                                <div class="fixed inset-0 bg-black/50 backdrop-blur-sm z-50 flex items-center justify-center">
                                    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg p-6 w-full max-w-md">
                                        <div class="flex justify-between items-center mb-4">
                                            <h2 class="text-lg font-bold text-gray-900 dark:text-white">Chi tiết sách</h2>
                                            <button wire:click="closeModal"
                                                class="text-gray-600 hover:text-gray-900 dark:text-gray-400">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                                    viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M6 18L18 6M6 6l12 12" />
                                                </svg>
                                            </button>
                                        </div>
                                        @if($selectedBook)
                                            <div>
                                                <p class="text-gray-700 dark:text-gray-300"><strong>Tên sách:</strong>
                                                    {{ $selectedBook->ten_sach }}</p>
                                                <p class="text-gray-700 dark:text-gray-300"><strong>Tác giả:</strong>
                                                    {{ $selectedBook->tacGia->ten_tac_gia ?? 'Không rõ' }}</p>
                                                <p class="text-gray-700 dark:text-gray-300"><strong>Nhà xuất bản:</strong>
                                                    {{ $selectedBook->nhaXuatBan->ten_nha_xuat_ban ?? 'Không rõ' }}</p>
                                                <p class="text-gray-700 dark:text-gray-300"><strong>Năm xuất bản:</strong>
                                                    {{ $selectedBook->nam_xuat_ban }}</p>
                                                <p class="text-gray-700 dark:text-gray-300"><strong>Thể loại:</strong>
                                                    {{ $selectedBook->theLoai->ten_the_loai ?? 'Không rõ' }}</p>
                                                <p class="text-gray-700 dark:text-gray-300"><strong>Số trang:</strong>
                                                    {{ $selectedBook->so_trang }}</p>
                                            </div>
                                        @endif
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
            <div class="p-4">
                <h3 class="font-semibold mb-2 line-clamp-2">{{ $book->ten_sach }}</h3>
                <p class="text-sm text-gray-600 mb-2">Tác giả: {{ $book->tacGia->ten ?? 'Không rõ' }}</p>
                <p class="text-sm text-gray-600 mb-2">Thể loại: {{ $book->theLoai->ten ?? 'Không rõ' }}</p>
                <span class="text-sm text-gray-500">Năm xuất bản: {{ $book->nam_xuat_ban }}</span>
            </div>
        </div>
    @endforeach

    <!-- Hiển thị phân trang -->
    <div class="mt-4">
        {{ $books->links() }}
    </div>
</div>