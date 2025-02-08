<div class="{{ $bgColor ?? 'bg-gray-500' }} text-white shadow-md rounded-lg p-4 flex flex-col items-center relative w-full">
    <!-- Số lượng người dùng -->
    <div class="self-start ml-4">
        <h2 class="text-3xl font-bold">{{ $userCount }}</h2>  
        <p class="text-lg">Người Dùng</p>
    </div>

    <!-- Ảnh avatar -->
    <div class="absolute right-4 bottom-16 opacity-30">
        <img src="{{ asset('images/avauser.jpeg') }}" alt="User Avatar" class="w-14 h-14 object-cover rounded-full">
    </div>

    <!-- Nút More Info -->
    <a href="{{ route('admin.manage-user') }}" 
       class="mt-3 w-full {{ $bgColor }} text-white text-center py-2 rounded-lg hover:bg-gray-700 transition duration-300 flex items-center justify-center">
        More Info
        <svg class="w-4 h-4 ml-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
        </svg>
    </a>
</div>
