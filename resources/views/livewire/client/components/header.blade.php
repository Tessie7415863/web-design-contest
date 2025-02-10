<nav class="fixed top-0 z-50 w-full bg-white border-b border-gray-200 dark:bg-gray-800 dark:border-gray-700">
    <div class="flex flex-wrap items-center justify-between mx-auto p-4">
        <div class="flex items-center justify-start rtl:justify-end">
            <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar"
                type="button"
                class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
                <span class="sr-only">Open sidebar</span>
                <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path clip-rule="evenodd" fill-rule="evenodd"
                        d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z">
                    </path>
                </svg>
            </button>
            <a href="/" class="flex ms-2 md:me-24">
                <img src="https://itc.edu.vn/Data/Sites/1/media/img/logo.png" class="h-8 me-3" alt="FlowBite Logo" />
                <span class="self-center text-xl font-semibold sm:text-2xl whitespace-nowrap dark:text-white"
                    style="font-family: 'Pacifico', cursive;">Thư Viện ITC</span>
            </a>
        </div>
        <div class="flex items-center md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
            @if(Auth::guard('sinhvien')->check())
            <!-- Hiển thị menu dành cho sinh viên -->
            <button type="button"
                class="flex text-sm bg-gray-800 rounded-full md:me-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600"
                id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown"
                data-dropdown-placement="bottom">
                <span class="sr-only">Open user menu</span>
                <img src="https://ui-avatars.com/api/{{ Auth::guard('sinhvien')->user()->ho_ten}}"
                    class="w-8 h-8 sm:w-10 sm:h-10 rounded-full border border-gray-300 dark:border-gray-600 shadow-md"
                    alt="avatar">
            </button>
            <!-- Dropdown menu -->
            <div class="z-50 hidden my-6 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-700 dark:divide-gray-600"
                style="margin-top: 5px !important;" id="user-dropdown">
                <div class="px-4 py-3">
                    <span class="block text-sm text-gray-900 dark:text-white">
                        {{ Auth::guard('sinhvien')->user()->ho_ten}}</span>
                    <span class="block text-sm text-gray-500 truncate dark:text-gray-400">
                        {{ Auth::guard('sinhvien')->user()->email }}</span>
                </div>
                <ul class="py-2" aria-labelledby="user-menu-button">
                    <li>
                        <a href="/lich-su-muon" wire:navigate
                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">
                            Lịch sử mượn sách / tài liệu</a>
                    </li>
                    <li>
                        <a href="/tai-khoan" wire:navigate
                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">
                            Quản lý tài khoản</a>
                    </li>
                    <li>
                        <a href="/logout" wire:navigate
                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Đăng
                            xuất</a>
                    </li>
                </ul>
            </div>
            @elseif(Auth::guard('web')->check())
            <!-- Hiển thị menu dành cho Admin -->
            <button type="button"
                class="flex text-sm bg-gray-800 rounded-full md:me-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600"
                id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown"
                data-dropdown-placement="bottom">
                <span class="sr-only">Open user menu</span>
                <img src="https://ui-avatars.com/api/{{ Auth::guard('web')->user()->name }}"
                    class="w-8 h-8 sm:w-10 sm:h-10 rounded-full border border-gray-300 dark:border-gray-600 shadow-md"
                    alt="avatar">
            </button>
            <!-- Dropdown menu -->
            <div class="z-50 hidden my-6 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-700 dark:divide-gray-600"
                style="margin-top: 5px !important;" id="user-dropdown">
                <div class="px-4 py-3">
                    <span class="block text-sm text-gray-900 dark:text-white">
                        {{ Auth::guard('web')->user()->name }}</span>
                    <span class="block text-sm text-gray-500 truncate dark:text-gray-400">
                        {{ Auth::guard('web')->user()->email }}</span>
                </div>
                <ul class="py-2" aria-labelledby="user-menu-button">
                    <li>
                        <a href="/admin" wire:navigate
                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">
                            Quản lý hệ thống</a>
                    </li>
                    <li>
                        <a href="/logout" wire:navigate
                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Đăng
                            xuất</a>
                    </li>
                </ul>
            </div>
            @else
            <!-- Hiển thị khi chưa đăng nhập -->
            <div class="pt-3 md:pt-0">
                <a wire:navigate href="/login"
                    class="py-2 px-3 sm:py-2.5 sm:px-4 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 dark:bg-blue-500 dark:hover:bg-blue-600 disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">
                    <svg class="flex-shrink-0 w-4 h-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2" />
                        <circle cx="12" cy="7" r="4" />
                    </svg>
                    <span class="sm:inline">Đăng nhập</span>
                </a>
            </div>
            @endif

            <button data-collapse-toggle="navbar-user" type="button"
                class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                aria-controls="navbar-user" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 17 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M1 1h15M1 7h15M1 13h15" />
                </svg>
            </button>
        </div>
        <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-user">
            <ul
                class="flex flex-col font-medium p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-800 dark:border-gray-700">
                <li>
                    <a wire:navigate href="/sach"
                        class="block py-2 px-3 {{ request()->is('sach') ? 'text-blue-700 ' : 'dark:text-white' }} md:hover:bg-transparent md:hover:text-blue-700 rounded md:bg-transparent md:p-0"
                        aria-current="page">Sách</a>
                </li>
                <li>
                    <a wire:navigate href="/tai-lieu"
                        class="block py-2 px-3 {{ request()->is('tai-lieu') ? 'text-blue-700 ' : 'dark:text-white' }} md:hover:bg-transparent md:hover:text-blue-700 rounded md:bg-transparent md:p-0">Tài
                        liệu</a>
                </li>
                <li>
                    <a wire:navigate href="/de-xuat"
                        class="block py-2 px-3 {{ request()->is('de-xuat') ? 'text-blue-700 ' : 'dark:text-white' }} md:hover:bg-transparent md:hover:text-blue-700 rounded md:bg-transparent md:p-0">Đề
                        xuất sách/tài liệu</a>
                </li>
                <li>
                    <a wire:navigate href="/lien-he"
                        class="block py-2 px-3 {{ request()->is('lien-he') ? 'text-blue-700 ' : 'dark:text-white' }} md:hover:bg-transparent md:hover:text-blue-700 rounded md:bg-transparent md:p-0">Liên
                        hệ</a>
                </li>
            </ul>
        </div>
    </div>
</nav>