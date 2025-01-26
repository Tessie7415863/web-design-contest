<!-- Sidebar -->
<aside class="bg-white text-black w-full md:w-64 min-h-[80vh] flex flex-col ml-2shadow-md rounded-md">
    <!-- Header -->
    <div class="p-4 text-lg font-semibold border-b border-gray-700 flex justify-center">
        <img src="https://itc.edu.vn/Data/Sites/1/media/img/logo.png" alt="" class="h-[80px]">
    </div>

    <!-- Navigation -->
    <nav class="flex flex-col p-4 space-y-2 overflow-auto">
        <!-- Dashboard -->
        <a href="/admin" class="block px-3 py-2 rounded-md 
        {{ request()->is('admin') ? 'bg-gray-400 text-blue-500' : 'text-black hover:bg-gray-300' }}">
            Dashboard
        </a>

        <!-- Quản lý Người dùng -->
        <div x-data="{ open: false }">
            <button @click="open = !open"
                class="flex justify-between items-center w-full px-3 py-2 text-left rounded-md text-black hover:bg-gray-300">
                Người dùng
                <span x-show="!open">▼</span>
                <span x-show="open">▲</span>
            </button>
            <div x-show="open" class="space-y-2 pl-4">
                <a href="/admin/manage-user"
                    class="block px-3 py-2 rounded-md 
                {{ request()->is('admin/manage-user') ? 'bg-gray-400 text-blue-500' : 'text-black hover:bg-gray-300' }}">
                    Users
                </a>
                <a href="/admin/manage-roles"
                    class="block px-3 py-2 rounded-md 
                {{ request()->is('admin/manage-roles') ? 'bg-gray-400 text-blue-500' : 'text-black hover:bg-gray-300' }}">
                    Roles
                </a>
                <a href="/admin/manage-permissions"
                    class="block px-3 py-2 rounded-md 
                {{ request()->is('admin/manage-permissions') ? 'bg-gray-400 text-blue-500' : 'text-black hover:bg-gray-300' }}">
                    Permissions
                </a>
                <a href="/admin/manage-rolehaspermission"
                    class="block px-3 py-2 rounded-md 
                {{ request()->is('admin/manage-rolehaspermission') ? 'bg-gray-400 text-blue-500' : 'text-black hover:bg-gray-300' }}">
                    Role has Permission
                </a>
            </div>
        </div>

        <!-- Quản lý Sinh viên -->
        <div x-data="{ open: false }">
            <button @click="open = !open"
                class="flex justify-between items-center w-full px-3 py-2 text-left rounded-md text-black hover:bg-gray-300">
                Sinh viên
                <span x-show="!open">▼</span>
                <span x-show="open">▲</span>
            </button>
            <div x-show="open" class="space-y-2 pl-4">
                <a href="/admin/manage-sinhvien"
                    class="block px-3 py-2 rounded-md 
                {{ request()->is('admin/manage-sinhvien') ? 'bg-gray-400 text-blue-500' : 'text-black hover:bg-gray-300' }}">
                    Sinh viên
                </a>
            </div>
        </div>

        <!-- Quản lý Khoa/Nhân viên -->
        <div x-data="{ open: false }">
            <button @click="open = !open"
                class="flex justify-between items-center w-full px-3 py-2 text-left rounded-md text-black hover:bg-gray-300">
                Khoa và Nhân viên
                <span x-show="!open">▼</span>
                <span x-show="open">▲</span>
            </button>
            <div x-show="open" class="space-y-2 pl-4">
                <a href="/admin/manage-khoa"
                    class="block px-3 py-2 rounded-md 
                {{ request()->is('admin/manage-khoa') ? 'bg-gray-400 text-blue-500' : 'text-black hover:bg-gray-300' }}">
                    Khoa
                </a>
                <a href="/admin/manage-nganh"
                    class="block px-3 py-2 rounded-md 
                {{ request()->is('admin/manage-nganh') ? 'bg-gray-400 text-blue-500' : 'text-black hover:bg-gray-300' }}">
                    Ngành
                </a>
                <a href="/admin/manage-bophan"
                    class="block px-3 py-2 rounded-md 
                {{ request()->is('admin/manage-bophan') ? 'bg-gray-400 text-blue-500' : 'text-black hover:bg-gray-300' }}">
                    Bộ phận
                </a>
                <a href="/admin/manage-nhanvien"
                    class="block px-3 py-2 rounded-md 
                {{ request()->is('admin/manage-nhanvien') ? 'bg-gray-400 text-blue-500' : 'text-black hover:bg-gray-300' }}">
                    Nhân viên
                </a>
            </div>
        </div>

        <!-- Quản lý Sách -->
        <div x-data="{ open: false }">
            <button @click="open = !open"
                class="flex justify-between items-center w-full px-3 py-2 text-left rounded-md text-black hover:bg-gray-300">
                Sách
                <span x-show="!open">▼</span>
                <span x-show="open">▲</span>
            </button>
            <div x-show="open" class="space-y-2 pl-4">
                <a href="/admin/manage-sach"
                    class="block px-3 py-2 rounded-md 
                {{ request()->is('admin/manage-sach') ? 'bg-gray-400 text-blue-500' : 'text-black hover:bg-gray-300' }}">
                    Sách
                </a>
                <a href="/admin/manage-vitrisach"
                    class="block px-3 py-2 rounded-md 
                {{ request()->is('admin/manage-vitrisach') ? 'bg-gray-400 text-blue-500' : 'text-black hover:bg-gray-300' }}">
                    Vị trí sách
                </a>
                <a href="/admin/manage-lienketsachnganh"
                    class="block px-3 py-2 rounded-md 
                {{ request()->is('admin/manage-lienketsachnganh') ? 'bg-gray-400 text-blue-500' : 'text-black hover:bg-gray-300' }}">
                    Liên kết sách ngành
                </a>
            </div>
        </div>

        <!-- Quản lý Phiếu -->
        <div x-data="{ open: false }">
            <button @click="open = !open"
                class="flex justify-between items-center w-full px-3 py-2 text-left rounded-md text-black hover:bg-gray-300">
                Phiếu
                <span x-show="!open">▼</span>
                <span x-show="open">▲</span>
            </button>
            <div x-show="open" class="space-y-2 pl-4">
                <a href="/admin/manage-phieumuon"
                    class="block px-3 py-2 rounded-md 
                {{ request()->is('admin/manage-phieumuon') ? 'bg-gray-400 text-blue-500' : 'text-black hover:bg-gray-300' }}">
                    Phiếu mượn
                </a>
                <a href="/admin/manage-phieutra"
                    class="block px-3 py-2 rounded-md 
                {{ request()->is('admin/manage-phieutra') ? 'bg-gray-400 text-blue-500' : 'text-black hover:bg-gray-300' }}">
                    Phiếu trả
                </a>
            </div>
        </div>

        <!-- Các quản lý khác -->
        <div x-data="{ open: false }">
            <button @click="open = !open"
                class="flex justify-between items-center w-full px-3 py-2 text-left rounded-md text-black hover:bg-gray-300">
                Khác
                <span x-show="!open">▼</span>
                <span x-show="open">▲</span>
            </button>
            <div x-show="open" class="space-y-2 pl-4">
                <a href="/admin/manage-loaitailieu"
                    class="block px-3 py-2 rounded-md 
                {{ request()->is('admin/manage-loaitailieu') ? 'bg-gray-400 text-blue-500' : 'text-black hover:bg-gray-300' }}">
                    Loại tài liệu
                </a>
                <a href="/admin/manage-nhaxuatban"
                    class="block px-3 py-2 rounded-md 
                {{ request()->is('admin/manage-nhaxuatban') ? 'bg-gray-400 text-blue-500' : 'text-black hover:bg-gray-300' }}">
                    Nhà xuất bản
                </a>
                <a href="/admin/manage-tacgia"
                    class="block px-3 py-2 rounded-md 
                {{ request()->is('admin/manage-tacgia') ? 'bg-gray-400 text-blue-500' : 'text-black hover:bg-gray-300' }}">
                    Tác giả
                </a>
                <a href="/admin/manage-theloai"
                    class="block px-3 py-2 rounded-md 
                {{ request()->is('admin/manage-theloai') ? 'bg-gray-400 text-blue-500' : 'text-black hover:bg-gray-300' }}">
                    Thể loại
                </a>
                <a href="/admin/manage-tailieumo"
                    class="block px-3 py-2 rounded-md 
                {{ request()->is('admin/manage-tailieumo') ? 'bg-gray-400 text-blue-500' : 'text-black hover:bg-gray-300' }}">
                    Tài liệu mở
                </a>
                <a href="/admin/manage-booksubject"
                    class="block px-3 py-2 rounded-md 
                {{ request()->is('admin/manage-booksubject') ? 'bg-gray-400 text-blue-500' : 'text-black hover:bg-gray-300' }}">
                    Book Subject
                </a>
            </div>
        </div>
    </nav>


</aside>