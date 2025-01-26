<!-- Sidebar -->
<aside class="bg-white text-black w-full md:w-64 max-h-fit min-h-[80vh] flex flex-col ml-2 mt-2 shadow-md rounded-md">
    <!-- Header -->
    <div class="p-4 text-lg font-semibold border-b border-gray-700 flex justify-center">
        <img src="https://itc.edu.vn/Data/Sites/1/media/img/logo.png" alt="" class="h-[80px]">
    </div>

    <!-- Navigation -->
    <nav class="flex flex-col p-4 space-y-2 overflow-auto">
        <a href="/admin"
            class="block px-3 py-2 rounded-md 
       {{ request()->is('admin') ? 'bg-gray-400 text-blue-500' : 'text-black hover:bg-gray-600 hover:text-gray-400' }}">
            Dashboard
        </a>
        <a href="/admin/manage-user"
            class="block px-3 py-2 rounded-md 
       {{ request()->is('admin/manage-user') ? 'bg-gray-400 text-blue-500' : 'text-black hover:bg-gray-600 hover:text-gray-400' }}">
            Users
        </a>
        <a href="/admin/manage-sinhvien"
            class="block px-3 py-2 rounded-md 
       {{ request()->is('admin/manage-sinhvien') ? 'bg-gray-400 text-blue-500' : 'text-black hover:bg-gray-600 hover:text-gray-400' }}">
            Sinh Vien
        </a>
        <a href="/admin/manage-permissions"
            class="block px-3 py-2 rounded-md 
       {{ request()->is('admin/manage-permissions') ? 'bg-gray-400 text-blue-500' : 'text-black hover:bg-gray-600 hover:text-gray-400' }}">
            Permissions
        </a>
        <a href="/admin/manage-roles"
            class="block px-3 py-2 rounded-md 
       {{ request()->is('admin/manage-roles') ? 'bg-gray-400 text-blue-500' : 'text-black hover:bg-gray-600 hover:text-gray-400' }}">
            Roles
        </a>
        <a href="/admin/manage-rolehaspermission"
            class="block px-3 py-2 rounded-md 
       {{ request()->is('admin/manage-rolehaspermission') ? 'bg-gray-400 text-blue-500' : 'text-black hover:bg-gray-600 hover:text-gray-400' }}">
            Role has Permission
        </a>
        <a href="/admin/manage-khoa"
            class="block px-3 py-2 rounded-md 
       {{ request()->is('admin/manage-khoa') ? 'bg-gray-400 text-blue-500' : 'text-black hover:bg-gray-600 hover:text-gray-400' }}">
            Khoa
        </a>
        <a href="/admin/manage-nganh"
            class="block px-3 py-2 rounded-md 
       {{ request()->is('admin/manage-nganh') ? 'bg-gray-400 text-blue-500' : 'text-black hover:bg-gray-600 hover:text-gray-400' }}">
            Nganh
        </a>
        <a href="/admin/manage-loaitailieu"
            class="block px-3 py-2 rounded-md 
       {{ request()->is('admin/manage-loaitailieu') ? 'bg-gray-400 text-blue-500' : 'text-black hover:bg-gray-600 hover:text-gray-400' }}">
            Loai Tai Lieu
        </a>
        <a href="/admin/manage-nhaxuatban"
            class="block px-3 py-2 rounded-md 
       {{ request()->is('admin/manage-nhaxuatban') ? 'bg-gray-400 text-blue-500' : 'text-black hover:bg-gray-600 hover:text-gray-400' }}">
            Nha Xuat Ban
        </a>
        <a href="/admin/manage-bophan"
            class="block px-3 py-2 rounded-md 
       {{ request()->is('admin/manage-bophan') ? 'bg-gray-400 text-blue-500' : 'text-black hover:bg-gray-600 hover:text-gray-400' }}">
            Bo Phan
        </a>
        <a href="/admin/manage-nhanvien"
            class="block px-3 py-2 rounded-md 
       {{ request()->is('admin/manage-nhanvien') ? 'bg-gray-400 text-blue-500' : 'text-black hover:bg-gray-600 hover:text-gray-400' }}">
            Nhan Vien
        </a>
        <a href="/admin/manage-tacgia"
            class="block px-3 py-2 rounded-md 
       {{ request()->is('admin/manage-tacgia') ? 'bg-gray-400 text-blue-500' : 'text-black hover:bg-gray-600 hover:text-gray-400' }}">
            Tac Gia
        </a>
        <a href="/admin/manage-theloai"
            class="block px-3 py-2 rounded-md 
       {{ request()->is('admin/manage-theloai') ? 'bg-gray-400 text-blue-500' : 'text-black hover:bg-gray-600 hover:text-gray-400' }}">
            The Loai
        </a>
        <a href="/admin/manage-monhoc"
            class="block px-3 py-2 rounded-md 
       {{ request()->is('admin/manage-monhoc') ? 'bg-gray-400 text-blue-500' : 'text-black hover:bg-gray-600 hover:text-gray-400' }}">
            Mon Hoc
        </a>
        <a href="/admin/manage-sach"
            class="block px-3 py-2 rounded-md 
       {{ request()->is('admin/manage-sach') ? 'bg-gray-400 text-blue-500' : 'text-black hover:bg-gray-600 hover:text-gray-400' }}">
            Sach
        </a>
        <a href="/admin/manage-vitrisach"
            class="block px-3 py-2 rounded-md 
       {{ request()->is('admin/manage-vitrisach') ? 'bg-gray-400 text-blue-500' : 'text-black hover:bg-gray-600 hover:text-gray-400' }}">
            Vi Tri Sach
        </a>
    </nav>
</aside>