<nav class="fixed top-16 left-0 right-0 bg-white shadow-sm z-40">
    <div class="container mx-auto px-6">
        <div class="flex space-x-8">
            <a wire:navigate href="/sach"
                class="flex items-center space-x-2 px-4 py-4 transition-colors {{ request()->is('sach') ? 'text-blue-600  border-b-2 border-blue-600' : 'text-gray-500' }}">
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                </svg>
                <span>Sách</span>
            </a>
            <a wire:navigate href="/tailieu"
                class="flex items-center space-x-2 px-4 py-4 transition-colors {{ request()->is('tailieu') ? 'text-blue-600  border-b-2 border-blue-600' : 'text-gray-500' }}">
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                </svg>
                <span>Tài liệu</span>
            </a>
        </div>
    </div>
</nav>