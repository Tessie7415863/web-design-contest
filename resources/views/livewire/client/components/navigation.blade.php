<nav class="fixed top-16 left-0 right-0 bg-white dark:bg-gray-900 shadow-sm dark:shadow-gray-800 z-40">
    <div class="container mx-auto px-4 sm:px-6">
        <!-- Desktop Navigation -->
        <div class="hidden sm:flex space-x-4 md:space-x-8">
            <a wire:click="setActiveTab('home')" class="flex items-center cursor-pointer space-x-2 px-3 md:px-4 py-4 border-b-2 transition-colors text-gray-700 dark:text-gray-300 {{ $activeTab === 'home'
    ? 'border-blue-600 dark:border-blue-500 text-blue-600 dark:text-blue-500'
    : 'border-transparent hover:border-gray-200 dark:hover:border-gray-700' }}">
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                </svg>
                <span class="text-sm md:text-base">Trang chủ</span>
            </a>

            <a wire:click="setActiveTab('books')" class="flex items-center cursor-pointer space-x-2 px-3 md:px-4 py-4 border-b-2 transition-colors text-gray-700 dark:text-gray-300 {{ $activeTab === 'books'
    ? 'border-blue-600 dark:border-blue-500 text-blue-600 dark:text-blue-500'
    : 'border-transparent hover:border-gray-200 dark:hover:border-gray-700' }}">
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                </svg>
                <span class="text-sm md:text-base">Sách</span>
            </a>

            <a wire:click="setActiveTab('documents')" class="flex items-center cursor-pointer space-x-2 px-3 md:px-4 py-4 border-b-2 transition-colors text-gray-700 dark:text-gray-300 {{ $activeTab === 'documents'
    ? 'border-blue-600 dark:border-blue-500 text-blue-600 dark:text-blue-500'
    : 'border-transparent hover:border-gray-200 dark:hover:border-gray-700' }}">
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                </svg>
                <span class="text-sm md:text-base">Tài liệu</span>
            </a>

            <a wire:click="setActiveTab('suggestions')" class="flex items-center cursor-pointer space-x-2 px-3 md:px-4 py-4 border-b-2 transition-colors text-gray-700 dark:text-gray-300 {{ $activeTab === 'suggestions'
    ? 'border-blue-600 dark:border-blue-500 text-blue-600 dark:text-blue-500'
    : 'border-transparent hover:border-gray-200 dark:hover:border-gray-700' }}">
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                <span class="text-sm md:text-base">Đề xuất</span>
            </a>
        </div>

        <!-- Mobile Navigation -->
        <div class="sm:hidden overflow-x-auto">
            <div class="flex space-x-4 min-w-max pb-1">
                <a wire:click="setActiveTab('home')" class="flex flex-col items-center space-y-1 px-4 py-2 text-center border-b-2 transition-colors text-gray-700 dark:text-gray-300 {{ $activeTab === 'home'
    ? 'border-blue-600 dark:border-blue-500 text-blue-600 dark:text-blue-500'
    : 'border-transparent hover:border-gray-200 dark:hover:border-gray-700' }}">
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                    </svg>
                    <span class="text-xs">Trang chủ</span>
                </a>

                <a wire:click="setActiveTab('books')" class="flex flex-col items-center space-y-1 px-4 py-2 text-center border-b-2 transition-colors text-gray-700 dark:text-gray-300 {{ $activeTab === 'books'
    ? 'border-blue-600 dark:border-blue-500 text-blue-600 dark:text-blue-500'
    : 'border-transparent hover:border-gray-200 dark:hover:border-gray-700' }}">
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                    </svg>
                    <span class="text-xs">Sách</span>
                </a>

                <a wire:click="setActiveTab('documents')" class="flex flex-col items-center space-y-1 px-4 py-2 text-center border-b-2 transition-colors text-gray-700 dark:text-gray-300 {{ $activeTab === 'documents'
    ? 'border-blue-600 dark:border-blue-500 text-blue-600 dark:text-blue-500'
    : 'border-transparent hover:border-gray-200 dark:hover:border-gray-700' }}">
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                    <span class="text-xs">Tài liệu</span>
                </a>

                <a wire:click="setActiveTab('suggestions')" class="flex flex-col items-center space-y-1 px-4 py-2 text-center border-b-2 transition-colors text-gray-700 dark:text-gray-300 {{ $activeTab === 'suggestions'
    ? 'border-blue-600 dark:border-blue-500 text-blue-600 dark:text-blue-500'
    : 'border-transparent hover:border-gray-200 dark:hover:border-gray-700' }}">
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                    <span class="text-xs">Đề xuất</span>
                </a>
            </div>
        </div>
    </div>
</nav>