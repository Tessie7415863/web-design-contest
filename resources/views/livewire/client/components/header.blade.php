<header class="fixed top-0 left-0 right-0 bg-white dark:bg-gray-900 shadow-md dark:shadow-gray-800 z-50">
    <div class="container mx-auto px-4 sm:px-6">
        <div class="flex items-center justify-between h-16">
            <!-- Logo section -->
            <div class="flex items-center space-x-3 sm:space-x-4">
                <img src="{{ asset('images/logo.png') }}" alt="Logo" class="h-6 w-6 sm:h-8 sm:w-8">
                <h1 class="text-lg sm:text-xl font-bold text-gray-900 dark:text-white">Thư viện ITC</h1>
            </div>

            <!-- Mobile search button -->
            <button id="mobileSearchButton" class="sm:hidden p-2 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-800">
                <svg class="w-5 h-5 text-gray-600 dark:text-gray-400" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
            </button>

            <!-- Search section (hidden by default on mobile) -->
            <!-- Search section -->
            <div class="hidden sm:flex flex-1 max-w-2xl mx-4 sm:mx-8">
                <div class="relative w-full">
                    <input wire:model.debounce.300ms="searchQuery" type="text" placeholder="Tìm kiếm sách, tài liệu..."
                        class="w-full px-4 py-2 bg-gray-50 dark:bg-gray-800 border dark:border-gray-700 rounded-full focus:ring-2 focus:ring-blue-500 dark:focus:ring-blue-400 focus:outline-none dark:text-gray-200 dark:placeholder-gray-400">
                    <svg class="absolute right-3 top-2.5 text-gray-400 dark:text-gray-500 w-5 h-5" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </div>
            </div>




            <!-- Right section -->
            <div class="flex items-center space-x-4 sm:space-x-6">
                <!-- Notification icon -->
                <svg class="w-5 h-5 sm:w-6 sm:h-6 text-gray-600 dark:text-gray-400 cursor-pointer hover:text-blue-600 dark:hover:text-blue-400 transition-colors"
                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                </svg>

                <!-- Guest section -->
                @guest
                    <div class="pt-3 md:pt-0">
                        <a wire:navigate href="/login"
                            class="py-2 px-3 sm:py-2.5 sm:px-4 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 dark:bg-blue-500 dark:hover:bg-blue-600 disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">
                            <svg class="flex-shrink-0 w-4 h-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round">
                                <path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2" />
                                <circle cx="12" cy="7" r="4" />
                            </svg>
                            <span class="hidden sm:inline">Đăng nhập</span>
                        </a>
                    </div>
                @endguest

                <!-- Auth section -->
                @auth
                    <div class="hs-dropdown [--strategy:static] md:[--strategy:fixed] [--adaptive:none] md:py-4">
                        <button type="button"
                            class="flex items-center w-full text-gray-500 hover:text-gray-400 dark:text-gray-400 dark:hover:text-gray-300 font-medium">
                            <div class="flex items-center space-x-2 sm:space-x-4">
                                <img src="https://ui-avatars.com/api/{{ auth()->user()->name }}"
                                    class="w-8 h-8 sm:w-10 sm:h-10 rounded-full border border-gray-300 dark:border-gray-600 shadow-md"
                                    alt="avatar">
                                <p class="block sm:hidden text-sm font-medium text-gray-700 dark:text-gray-300">
                                    {{ auth()->user()->name }}
                                </p>
                            </div>
                        </button>

                        <!-- Dropdown menu -->
                        <div class="hs-dropdown-menu absolute z-[100] hidden bg-white dark:bg-gray-800 shadow-md rounded-lg p-2 border dark:border-gray-700 dark:divide-gray-700
                                                                right-[10px] top-[50px]
                                                                                   md:top-full md:right-0 md:w-48
                                                                                   sm:top-[50px] sm:right-[30px] w-fit">
                            <div class="px-4 py-3 border-b border-gray-200 dark:border-gray-700">
                                <p class="text-sm text-gray-700 dark:text-gray-300">{{ auth()->user()->name }}</p>
                                <p class="text-xs text-gray-500 dark:text-gray-400 truncate max-w-full">
                                    {{ auth()->user()->email }}
                                </p>
                            </div>
                            <hr class="dark:border-gray-700">
                            @livewire('theme-switcher')
                            <hr class="dark:border-gray-700">
                            <a class="flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 dark:focus:ring-gray-600"
                                href="#" wire:navigate>
                                Lịch sử mượn sách / tài liệu
                            </a>
                            <a class="flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 dark:focus:ring-gray-600"
                                href="#" wire:navigate>
                                Quản lý tài khoản
                            </a>
                            <a class="flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 dark:focus:ring-gray-600"
                                href="/logout" wire:navigate>
                                Đăng xuất
                            </a>
                        </div>

                    </div>
                @endauth
            </div>
        </div>
    </div>

    <!-- Mobile search bar -->
    <div id="mobileSearchSection" class="sm:hidden px-4 pb-4">
        <div class="relative w-full">
            <input wire:model.debounce.300ms="searchQuery" type="text" placeholder="Tìm kiếm sách, tài liệu..."
                class="w-full px-4 py-2 bg-gray-50 dark:bg-gray-800 border dark:border-gray-700 rounded-full focus:ring-2 focus:ring-blue-500 dark:focus:ring-blue-400 focus:outline-none dark:text-gray-200 dark:placeholder-gray-400">
            <svg class="absolute right-3 top-2.5 text-gray-400 dark:text-gray-500 w-5 h-5" fill="none"
                viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
            </svg>
        </div>
    </div>
</header>
<script>
    const mobileSearchButton = document.getElementById('mobileSearchButton');
    const mobileSearchSection = document.getElementById('mobileSearchSection');

    mobileSearchButton.addEventListener('click', () => {
        // Toggle hidden class
        mobileSearchSection.classList.toggle('hidden');

        // Add focus to input field when section is displayed
        if (!mobileSearchSection.classList.contains('hidden')) {
            const inputField = mobileSearchSection.querySelector('input');
            inputField.focus();
        }
    });
</script>