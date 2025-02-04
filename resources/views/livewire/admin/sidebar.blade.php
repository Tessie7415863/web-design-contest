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
        {{ request()->is('admin') ? ' bg-gray-400 text-black-500 text-center' : 'text-black hover:bg-gray-300' }}">
            DASHBOARD
        </a>

        <!-- Quản lý Người dùng -->
        <div x-data="{ open: false }">
            <button @click="open = !open"
                class="flex justify-between items-center w-full px-3 py-2 text-left rounded-md text-black hover:bg-gray-300 hover:text-blue-500 transition">
                Người dùng
                <span :class="open ? 'rotate-180' : 'rotate-0'" class="transition-transform">▼</span>
            </button>
            <div x-show="open" class="space-y-2 pl-4">
                <a href="/admin/manage-user"
                    class="block px-3 py-2 rounded-md 
                {{ request()->is('admin/manage-user') ? 'bg-gray-400 text-blue-500' : 'text-black hover:bg-gray-300 hover:text-blue-500 transition' }}">
                    Users
                </a>
                <a href="/admin/manage-roles"
                    class="block px-3 py-2 rounded-md 
                {{ request()->is('admin/manage-roles') ? 'bg-gray-400 text-blue-500' : 'text-black hover:bg-gray-300 hover:text-blue-500 transition' }}">
                    Roles
                </a>
                <a href="/admin/manage-permissions"
                    class="block px-3 py-2 rounded-md 
                {{ request()->is('admin/manage-permissions') ? 'bg-gray-400 text-blue-500' : 'text-black hover:bg-gray-300 hover:text-blue-500 transition' }}">
                    Permissions
                </a>
                <a href="/admin/manage-rolehaspermission"
                    class="block px-3 py-2 rounded-md 
                {{ request()->is('admin/manage-rolehaspermission') ? 'bg-gray-400 text-blue-500' : 'text-black hover:bg-gray-300 hover:text-blue-500 transition' }}">
                    Role has Permission
                </a>
            </div>
        </div>

        <!-- Quản lý Sinh viên -->
        <div x-data="{ open: false }">
            <button @click="open = !open"
                class="flex justify-between items-center w-full px-3 py-2 text-left rounded-md text-black hover:bg-gray-300 hover:text-blue-500 transition">
                Sinh viên
                <span :class="open ? 'rotate-180' : 'rotate-0'" class="transition-transform">▼</span>
            </button>
            <div x-show="open" class="space-y-2 pl-4">
                <a href="/admin/manage-sinhvien"
                    class="block px-3 py-2 rounded-md 
                {{ request()->is('admin/manage-sinhvien') ? 'bg-gray-400 text-blue-500' : 'text-black hover:bg-gray-300 hover:text-blue-500 transition' }}">
                    Sinh viên
                </a>
            </div>
        </div>

        <!-- Quản lý Khoa/Nhân viên -->
        <div x-data="{ open: false }">
            <button @click="open = !open"
                class="flex justify-between items-center w-full px-3 py-2 text-left rounded-md text-black hover:bg-gray-300 hover:text-blue-500 transition">
                Khoa và Nhân viên
                <span :class="open ? 'rotate-180' : 'rotate-0'" class="transition-transform">▼</span>
            </button>
            <div x-show="open" class="space-y-2 pl-4">
                <a href="/admin/manage-khoa"
                    class="block px-3 py-2 rounded-md 
                {{ request()->is('admin/manage-khoa') ? 'bg-gray-400 text-blue-500' : 'text-black hover:bg-gray-300 hover:text-blue-500 transition' }}">
                    Khoa
                </a>
                <a href="/admin/manage-nganh"
                    class="block px-3 py-2 rounded-md 
                {{ request()->is('admin/manage-nganh') ? 'bg-gray-400 text-blue-500' : 'text-black hover:bg-gray-300 hover:text-blue-500 transition' }}">
                    Ngành
                </a>
                <a href="/admin/manage-bophan"
                    class="block px-3 py-2 rounded-md 
                {{ request()->is('admin/manage-bophan') ? 'bg-gray-400 text-blue-500' : 'text-black hover:bg-gray-300 hover:text-blue-500 transition' }}">
                    Bộ phận
                </a>
                <a href="/admin/manage-nhanvien"
                    class="block px-3 py-2 rounded-md 
                {{ request()->is('admin/manage-nhanvien') ? 'bg-gray-400 text-blue-500' : 'text-black hover:bg-gray-300 hover:text-blue-500 transition' }}">
                    Nhân viên
                </a>
            </div>
        </div>

        <!-- Quản lý Sách -->
        <div x-data="{ open: false }">
            <button @click="open = !open"
                class="flex justify-between items-center w-full px-3 py-2 text-left rounded-md text-black hover:bg-gray-300 hover:text-blue-500 transition">
                Sách
                <span :class="open ? 'rotate-180' : 'rotate-0'" class="transition-transform">▼</span>
            </button>
            <div x-show="open" class="space-y-2 pl-4">
                <a href="/admin/manage-sach"
                    class="block px-3 py-2 rounded-md 
                {{ request()->is('admin/manage-sach') ? 'bg-gray-400 text-blue-500' : 'text-black hover:bg-gray-300 hover:text-blue-500 transition' }}">
                    Sách
                </a>
                <a href="/admin/manage-vitrisach"
                    class="block px-3 py-2 rounded-md 
                {{ request()->is('admin/manage-vitrisach') ? 'bg-gray-400 text-blue-500' : 'text-black hover:bg-gray-300 hover:text-blue-500 transition' }}">
                    Vị trí sách
                </a>
                <a href="/admin/manage-lienketsachnganh"
                    class="block px-3 py-2 rounded-md 
                {{ request()->is('admin/manage-lienketsachnganh') ? 'bg-gray-400 text-blue-500' : 'text-black hover:bg-gray-300 hover:text-blue-500 transition' }}">
                    Liên kết sách ngành
                </a>
                <a href="/admin/manage-monhoc"
                    class="block px-3 py-2 rounded-md 
                {{ request()->is('admin/manage-monhoc') ? 'bg-gray-400 text-blue-500' : 'text-black hover:bg-gray-300 hover:text-blue-500 transition' }}">
                    Môn Học
                </a>
                <a href="/admin/manage-booksubject"
                    class="block px-3 py-2 rounded-md 
                {{ request()->is('admin/manage-booksubject') ? 'bg-gray-400 text-blue-500' : 'text-black hover:bg-gray-300 hover:text-blue-500 transition' }}">
                    Book Subject
                </a>
            </div>
        </div>

        <!-- Quản lý Phiếu -->
        <div x-data="{ open: false }">
            <button @click="open = !open"
                class="flex justify-between items-center w-full px-3 py-2 text-left rounded-md text-black hover:bg-gray-300 hover:text-blue-500 transition">
                Phiếu
                <span :class="open ? 'rotate-180' : 'rotate-0'" class="transition-transform">▼</span>
            </button>
            <div x-show="open" class="space-y-2 pl-4">
                <a href="/admin/manage-phieumuon"
                    class="block px-3 py-2 rounded-md 
                {{ request()->is('admin/manage-phieumuon') ? 'bg-gray-400 text-blue-500' : 'text-black hover:bg-gray-300 hover:text-blue-500 transition' }}">
                    Phiếu mượn
                </a>
                <a href="/admin/manage-phieutra"
                    class="block px-3 py-2 rounded-md 
                {{ request()->is('admin/manage-phieutra') ? 'bg-gray-400 text-blue-500' : 'text-black hover:bg-gray-300 hover:text-blue-500 transition' }}">
                    Phiếu trả
                </a>
                <a href="/admin/manage-phat"
                    class="block px-3 py-2 rounded-md 
                {{ request()->is('admin/manage-phat') ? 'bg-gray-400 text-blue-500' : 'text-black hover:bg-gray-300 hover:text-blue-500 transition' }}">
                    Phạt
                </a>
                <a href="/admin/manage-hoadonphat"
                    class="block px-3 py-2 rounded-md 
                {{ request()->is('admin/manage-hoadonphat') ? 'bg-gray-400 text-blue-500' : 'text-black hover:bg-gray-300 hover:text-blue-500 transition' }}">
                    Hóa đơn phạt
                </a>
            </div>
        </div>

        <!-- Quản lý tài liệu -->
        <div x-data="{ open: false }">
            <button @click="open = !open"
                class="flex justify-between items-center w-full px-3 py-2 text-left rounded-md text-black hover:bg-gray-300 hover:text-blue-500 transition">
                Tài liệu
                <span :class="open ? 'rotate-180' : 'rotate-0'" class="transition-transform">▼</span>
            </button>
            <div x-show="open" class="space-y-2 pl-4">
                <a href="/admin/manage-loaitailieu"
                    class="block px-3 py-2 rounded-md 
                {{ request()->is('admin/manage-loaitailieu') ? 'bg-gray-400 text-blue-500' : 'text-black hover:bg-gray-300 hover:text-blue-500 transition' }}">
                    Loại tài liệu
                </a>

                <a href="/admin/manage-tailieumo"
                    class="block px-3 py-2 rounded-md 
                {{ request()->is('admin/manage-tailieumo') ? 'bg-gray-400 text-blue-500' : 'text-black hover:bg-gray-300 hover:text-blue-500 transition' }}">
                    Tài liệu mở
                </a>
            </div>
        </div>

        <!-- Các quản lý khác -->
        <div x-data="{ open: false }">
            <button @click="open = !open"
                class="flex justify-between items-center w-full px-3 py-2 text-left rounded-md text-black hover:bg-gray-300 hover:text-blue-500 transition">
                Khác
                <span :class="open ? 'rotate-180' : 'rotate-0'" class="transition-transform">▼</span>
            </button>
            <div x-show="open" class="space-y-2 pl-4">
                <a href="/admin/manage-nhaxuatban"
                    class="block px-3 py-2 rounded-md 
                {{ request()->is('admin/manage-nhaxuatban') ? 'bg-gray-400 text-blue-500' : 'text-black hover:bg-gray-300 hover:text-blue-500 transition' }}">
                    Nhà xuất bản
                </a>
                <a href="/admin/manage-tacgia"
                    class="block px-3 py-2 rounded-md 
                {{ request()->is('admin/manage-tacgia') ? 'bg-gray-400 text-blue-500' : 'text-black hover:bg-gray-300 hover:text-blue-500 transition' }}">
                    Tác giả
                </a>
                <a href="/admin/manage-theloai"
                    class="block px-3 py-2 rounded-md 
                {{ request()->is('admin/manage-theloai') ? 'bg-gray-400 text-blue-500' : 'text-black hover:bg-gray-300 hover:text-blue-500 transition' }}">
                    Thể loại
                </a>
                <a href="/admin/manage-digitalresourcemajor"
                    class="block px-3 py-2 rounded-md 
                {{ request()->is('admin/manage-digitalresourcemajor') ? 'bg-gray-400 text-blue-500' : 'text-black hover:bg-gray-300 hover:text-blue-500 transition' }}">
                    Digital Resource Major
                </a>
                <a href="/admin/manage-digitalresourcesubject"
                    class="block px-3 py-2 rounded-md 
                {{ request()->is('admin/manage-digitalresourcesubject') ? 'bg-gray-400 text-blue-500' : 'text-black hover:bg-gray-300 hover:text-blue-500 transition' }}">
                    Digital Resource Subject
                </a>
            </div>

            <!-- Quản lý hệ thống và bảo mật -->
            <div x-data="{ open: false }">
                <button @click="open = !open"
                    class="flex justify-between items-center w-full px-3 py-2 text-left rounded-md text-black hover:bg-gray-300 hover:text-blue-500 transition">
                    Hệ thống và bảo mật
                    <span :class="open ? 'rotate-180' : 'rotate-0'" class="transition-transform">▼</span>
                </button>
                <div x-show="open" class="space-y-2 pl-4">
                    <a href="/admin/manage-failedjob"
                        class="block px-3 py-2 rounded-md 
                {{ request()->is('admin/manage-failedjob') ? 'bg-gray-400 text-blue-500' : 'text-black hover:bg-gray-300 hover:text-blue-500 transition' }}">
                        Failed Job
                    </a>

                    <a href="/admin/manage-tailieumo"
                        class="block px-3 py-2 rounded-md 
                {{ request()->is('admin/manage-tailieumo') ? 'bg-gray-400 text-blue-500' : 'text-black hover:bg-gray-300 hover:text-blue-500 transition' }}">
                        Tài liệu mở
                    </a>
                </div>
            </div>
        </div>
    </nav>


</aside>