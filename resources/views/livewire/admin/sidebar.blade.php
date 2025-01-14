<!-- Sidebar -->
<aside class="bg-gray-800 text-white w-full md:w-64 h-16 md:h-full flex-shrink-0 md:flex md:flex-col">
    <div class="p-4 text-lg font-semibold border-b border-gray-700">
        Admin Panel
    </div>
    <nav class="flex flex-row md:flex-col space-x-4 md:space-x-0 md:space-y-2 p-4">
        <a href="/admin" wire:navigate class="block text-gray-300 hover:text-white px-2 py-1 rounded-md">Dashboard</a>
        <a href="/admin/manage-user" wire:navigate
            class="block text-gray-300 hover:text-white px-2 py-1 rounded-md">Users</a>
    </nav>
</aside>