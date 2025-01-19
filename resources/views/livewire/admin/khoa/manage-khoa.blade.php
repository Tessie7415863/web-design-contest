<div class="flex flex-col md:flex-row h-screen">
    @livewire('admin.sidebar')
    <!-- Main Content -->
    <div class="flex-1 flex flex-col h-full">
        @livewire('admin.header')
        @livewire('admin.khoa.main')
    </div>
</div>