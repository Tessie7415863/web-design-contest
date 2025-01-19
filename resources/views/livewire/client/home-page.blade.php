<div class="min-h-screen bg-white dark:bg-gray-900">
    @livewire('client.components.header')
    @livewire('client.components.navigation')

    <div class="container mx-auto px-4 sm:px-6 bg-gray-50 dark:bg-gray-800 pt-24 sm:pt-36 pb-4">
        <!-- Main Content Layout -->
        <div class="flex flex-col lg:flex-row gap-4 lg:gap-6">
            <!-- Sidebar - Hidden on mobile, shown on lg screens -->
            <div class="hidden lg:block">
                @livewire('client.components.sidebar')
            </div>

            <!-- Main Content Area -->
            <div class="flex-1">
                <!-- Featured Resources Section -->
                <div class="mb-6 sm:mb-8">
                    <h2 class="text-xl sm:text-2xl font-bold mb-4 sm:mb-6 text-gray-900 dark:text-white">
                        Tài nguyên nổi bật
                    </h2>
                    <!-- Grid Layout for Books and Documents -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-6 mb-8 sm:mb-12">
                        @if($activeSection === 'all' || $activeSection === 'books')
                            @foreach($featuredBooks as $book)
                                <div class="transition transform hover:-translate-y-1 duration-200">
                                    @livewire('client.components.book-card', ['book' => $book], key('book-' . $book->id))
                                </div>
                            @endforeach
                        @endif

                    </div>

                    <!-- Mobile Sidebar Toggle -->
                    <div class="fixed bottom-4 left-4 lg:hidden">
                        <button onclick="toggleSidebar()"
                            class="p-3 bg-blue-600 dark:bg-blue-500 text-white rounded-full shadow-lg hover:bg-blue-700 dark:hover:bg-blue-600 transition-colors">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 6h16M4 12h16m-7 6h7" />
                            </svg>
                        </button>
                    </div>

                    <!-- Mobile Sidebar -->
                    <div id="mobileSidebar" class="fixed inset-0 bg-black bg-opacity-50 z-50 hidden lg:hidden">
                        <div
                            class="absolute left-0 top-0 h-full md:w-64 bg-white dark:bg-gray-800 shadow-xl transform transition-transform duration-300 -translate-x-full overflow-y-auto">
                            <div class="p-4">
                                @livewire('client.components.sidebar')
                            </div>
                        </div>
                    </div>
                    <div class="mt-6">
                        <!-- navigation -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function toggleSidebar() {
            const sidebar = document.getElementById('mobileSidebar');
            const sidebarContent = sidebar.querySelector('div');

            if (sidebar.classList.contains('hidden')) {
                sidebar.classList.remove('hidden');
                setTimeout(() => {
                    sidebarContent.classList.remove('-translate-x-full');
                }, 0);
            } else {
                sidebarContent.classList.add('-translate-x-full');
                setTimeout(() => {
                    sidebar.classList.add('hidden');
                }, 300);
            }
        }

        // Close sidebar when clicking outside
        document.getElementById('mobileSidebar').addEventListener('click', function (e) {
            if (e.target === this) {
                toggleSidebar();
            }
        });
    </script>