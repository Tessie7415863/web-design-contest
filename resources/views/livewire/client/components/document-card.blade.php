<div class="bg-white rounded-xl overflow-hidden shadow-lg hover:shadow-xl transition-all duration-300 group">
    <div class="relative">
        <img src="{{ $document->cover_image }}" alt="{{ $document->title }}"
            class="w-full h-48 object-cover transition-transform duration-300 group-hover:scale-105">
        <div
            class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
            <div class="absolute bottom-4 left-4 right-4 flex justify-between items-center">
                <button wire:click="downloadDocument"
                    class="bg-green-600 px-4 py-2 rounded-full text-sm text-white hover:bg-green-700 transition-colors">
                    Tải xuống
                </button>
                <button wire:click="viewDocument"
                    class="bg-blue-600 px-4 py-2 rounded-full text-sm text-white hover:bg-blue-700 transition-colors">
                    Xem online
                </button>
            </div>
        </div>
    </div>
    <div class="p-4">
        <div class="flex items-center justify-between mb-2">
            <span class="text-xs font-medium px-2 py-1 bg-blue-100 text-blue-800 rounded-full">
                {{ $document->file_type }}
            </span>
            <div class="flex items-center text-gray-500 text-sm">
                <span class="mr-3">{{ $document->views }} lượt xem</span>
                <span>{{ $document->downloads }} tải</span>
            </div>
        </div>
        <h3 class="font-semibold mb-2 line-clamp-2">{{ $document->title }}</h3>
        <p class="text-sm text-gray-600 mb-2">{{ $document->author }}</p>
        <div class="flex justify-between items-center">
            <span class="text-sm text-gray-500">{{ $document->category }}</span>
            <span class="text-sm text-gray-500">{{ $document->published_year }}</span>
        </div>
    </div>
</div>