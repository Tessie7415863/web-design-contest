<!-- Sidebar -->
<<<<<<< HEAD
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
=======
<aside class="bg-gray-800 text-white w-full md:w-64 h-16 md:h-full flex-shrink-0 md:flex md:flex-col overflow-y-auto">
    <div class="p-4 text-lg font-semibold border-b border-gray-700">
        Admin Panel
    </div>
    <nav class="flex flex-row md:flex-col space-x-4 md:space-x-0 md:space-y-2 p-4 ">
        <a href="/admin" wire:navigate class="block text-gray-300 hover:text-white px-2 py-1 rounded-md">Dashboard</a>
        <a href="/admin/manage-user" wire:navigate
            class="block text-gray-300 hover:text-white px-2 py-1 rounded-md">Users</a>
        <a href="/admin/manage-sinhvien" wire:navigate
            class="block text-gray-300 hover:text-white px-2 py-1 rounded-md">Sinh Vien</a>
        <a href="/admin/manage-permissions" wire:navigate
            class="block text-gray-300 hover:text-white px-2 py-1 rounded-md">Permissions</a>
        <a href="/admin/manage-roles" wire:navigate
            class="block text-gray-300 hover:text-white px-2 py-1 rounded-md">Roles</a>
        <a href="/admin/manage-rolehaspermission" wire:navigate
            class="block text-gray-300 hover:text-white px-2 py-1 rounded-md">Role has Permission</a>
        <a href="/admin/manage-khoa" wire:navigate
            class="block text-gray-300 hover:text-white px-2 py-1 rounded-md">Khoa</a>
        <a href="/admin/manage-nganh" wire:navigate
            class="block text-gray-300 hover:text-white px-2 py-1 rounded-md">Nganh</a>
        <a href="/admin/manage-loaitailieu" wire:navigate
            class="block text-gray-300 hover:text-white px-2 py-1 rounded-md">Loai Tai Lieu</a>
        <a href="/admin/manage-nhaxuatban" wire:navigate
            class="block text-gray-300 hover:text-white px-2 py-1 rounded-md">Nha Xuat Ban</a>
        <a href="/admin/manage-bophan" wire:navigate
            class="block text-gray-300 hover:text-white px-2 py-1 rounded-md">Bo Phan</a>
        <a href="/admin/manage-nhanvien" wire:navigate
            class="block text-gray-300 hover:text-white px-2 py-1 rounded-md">Nhan Vien</a>
        <a href="/admin/manage-tacgia" wire:navigate
            class="block text-gray-300 hover:text-white px-2 py-1 rounded-md">Tac Gia</a>
        <a href="/admin/manage-theloai" wire:navigate
            class="block text-gray-300 hover:text-white px-2 py-1 rounded-md">The Loai</a>
        <a href="/admin/manage-monhoc" wire:navigate
            class="block text-gray-300 hover:text-white px-2 py-1 rounded-md">Mon Hoc</a>
        <a href="/admin/manage-sach" wire:navigate
            class="block text-gray-300 hover:text-white px-2 py-1 rounded-md">Sach</a>
        <a href="/admin/manage-vitrisach" wire:navigate
            class="block text-gray-300 hover:text-white px-2 py-1 rounded-md">Vi Tri Sach</a>
        <a href="/admin/manage-cuonsach" wire:navigate
            class="block text-gray-300 hover:text-white px-2 py-1 rounded-md">Cuon Sach</a>
        <a href="/admin/manage-datsach" wire:navigate
            class="block text-gray-300 hover:text-white px-2 py-1 rounded-md">Dat Sach</a>
        <a href="/admin/manage-lienketsachnganh" wire:navigate
            class="block text-gray-300 hover:text-white px-2 py-1 rounded-md">Lien Ket Sach Nganh</a>
        <a href="/admin/manage-tailieumo" wire:navigate
            class="block text-gray-300 hover:text-white px-2 py-1 rounded-md">Tai Lieu Mo</a>
        <a href="/admin/manage-booksubject" wire:navigate
            class="block text-gray-300 hover:text-white px-2 py-1 rounded-md">Book Subject</a>
        <a href="/admin/manage-phieumuon" wire:navigate
            class="block text-gray-300 hover:text-white px-2 py-1 rounded-md">Phieu Muon</a>
        <a href="/admin/manage-phieutra" wire:navigate
            class="block text-gray-300 hover:text-white px-2 py-1 rounded-md">Phieu Tra</a>
>>>>>>> 27fb9055a760385eef884069f779abb5f835df5d
    </nav>
</aside>