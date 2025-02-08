<!-- Main Section -->
<main class="flex-1 overflow-y-auto p-6">
    <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
        <!-- Example Cards -->
        @livewire('user-count')
        @livewire('sinh-vien-count')
        @livewire('sach-count')
        @livewire('tai-lieu-count')
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        @livewire('table.new-books')
        @livewire('table.bi-phat')
    </div>
</main>