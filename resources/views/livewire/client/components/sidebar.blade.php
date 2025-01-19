<div class="w-64 flex-shrink-0 scroll-auto">
    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg dark:shadow-gray-900 p-6 sticky top-36">
        <!-- Header with collapse all button -->
        <div class="flex items-center justify-between mb-6">
            <h2 class="font-semibold text-gray-900 dark:text-white">Bộ lọc tìm kiếm</h2>
            <button wire:click="toggleAllFilters"
                class="text-sm text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-300">
                <span x-text="allExpanded ? 'Thu gọn tất cả' : 'Mở rộng tất cả'"></span>
            </button>
        </div>

        <div class="space-y-6">
            @foreach($options as $filterKey => $filterOptions)
                <div x-data="{ expanded: true }" class="space-y-3 border-b dark:border-gray-700 pb-4 last:border-0">
                    <!-- Filter category header -->
                    <div @click="expanded = !expanded" class="flex items-center justify-between cursor-pointer group">
                        <h3
                            class="text-sm font-medium text-gray-700 dark:text-gray-300 group-hover:text-gray-900 dark:group-hover:text-white">
                            {{ ucfirst($filterKey) }}
                        </h3>
                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400 transition-transform duration-200"
                            :class="expanded ? 'rotate-180' : ''" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </div>

                    <!-- Filter options -->
                    <div x-show="expanded" x-transition:enter="transition ease-out duration-200"
                        x-transition:enter-start="opacity-0 transform -translate-y-2"
                        x-transition:enter-end="opacity-100 transform translate-y-0"
                        x-transition:leave="transition ease-in duration-150"
                        x-transition:leave-start="opacity-100 transform translate-y-0"
                        x-transition:leave-end="opacity-0 transform -translate-y-2" class="space-y-2">
                        @foreach($filterOptions as $option)
                            <label class="flex items-center space-x-2 cursor-pointer group">
                                <input type="checkbox" wire:model="filters.{{ $filterKey }}" value="{{ $option }}" class="rounded border-gray-300 dark:border-gray-600 text-blue-600 dark:text-blue-500 
                                                                focus:ring-blue-500 dark:focus:ring-blue-400 dark:bg-gray-700
                                                                checked:bg-blue-600 dark:checked:bg-blue-500">
                                <span
                                    class="text-sm text-gray-600 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-gray-300">
                                    {{ $option }}
                                </span>
                            </label>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Mobile filter button -->
        <div class="lg:hidden fixed bottom-4 left-4 z-50">
            <button @click="$dispatch('toggle-filters')"
                class="flex items-center space-x-2 bg-blue-600 dark:bg-blue-500 text-white px-4 py-2 rounded-full shadow-lg hover:bg-blue-700 dark:hover:bg-blue-600 transition-colors">
                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4" />
                </svg>
                <span>Bộ lọc</span>
            </button>
        </div>

        <!-- Mobile filter drawer -->
        <div x-data="{ open: false }" @toggle-filters.window="open = !open" x-show="open"
            class="lg:hidden fixed inset-0 z-50 bg-black bg-opacity-50"
            x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
            <div class="absolute bottom-0 left-0 right-0 max-h-[80vh] bg-white dark:bg-gray-800 rounded-t-xl shadow-xl transform transition-transform duration-300"
                x-transition:enter-start="translate-y-full" x-transition:enter-end="translate-y-0"
                x-transition:leave-start="translate-y-0" x-transition:leave-end="translate-y-full">
                <div class="p-4 border-b dark:border-gray-700">
                    <div class="flex items-center justify-between">
                        <h2 class="font-semibold text-gray-900 dark:text-white">Bộ lọc tìm kiếm</h2>
                        <button @click="open = false"
                            class="p-2 text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-300">
                            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                </div>
                <div class="p-4 overflow-y-auto">
                    <!-- Filter content (same as desktop) -->
                    <div class="space-y-6">
                        <!-- Copy the filter options loop here -->
                    </div>
                </div>
                <div class="p-4 border-t dark:border-gray-700">
                    <button @click="open = false"
                        class="w-full bg-blue-600 dark:bg-blue-500 text-white py-2 rounded-lg hover:bg-blue-700 dark:hover:bg-blue-600 transition-colors">
                        Áp dụng bộ lọc
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Alpine.js initialization -->
<script>
    document.addEventListener('alpine:init', () => {
        Alpine.store('filters', {
            allExpanded: true,
            toggleAll() {
                this.allExpanded = !this.allExpanded;
                document.querySelectorAll('[x-data]').forEach(el => {
                    el.__x.$data.expanded = this.allExpanded;
                });
            }
        });
    });
</script>