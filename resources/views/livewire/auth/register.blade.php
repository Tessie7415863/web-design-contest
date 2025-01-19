<div class="min-h-screen bg-gray-100 flex items-center justify-center p-4">
    <div class="max-w-md w-full bg-white rounded-xl shadow-lg p-8">
        <h2 class="text-2xl font-bold text-gray-900 mb-6 text-center">Đăng Ký</h2>

        <form class="space-y-4" wire:submit.prevent="register">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Họ Tên</label>
                <input type="text" wire:model="name"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none transition-all"
                    placeholder="Nhập name của bạn" />
                @error('name')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                <input type="email" wire:model="email"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none transition-all"
                    placeholder="Nhập email của bạn" />
                @error('email')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Mật khẩu</label>
                <input type="password" wire:model="password"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none transition-all"
                    placeholder="Nhập mật khẩu của bạn" />
                @error('password')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Nhập lại Mật khẩu</label>
                <input type="password" wire:model="password_confirmation"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none transition-all"
                    placeholder="Nhập lại mật khẩu của bạn" />
                @error('password_confirmation')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
            </div>

            <div class="flex items-center justify-between">
                <div></div>
                <a href="/forgot" class="text-sm text-indigo-600 hover:text-indigo-500">Quên mật khẩu?</a>
            </div>

            <button type="submit"
                class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-medium py-2.5 rounded-lg transition-colors">
                Đăng ký
            </button>
        </form>
        <div class="mt-6 text-center text-sm text-gray-600">
            Đã có tài khoản?
            <a href="/login" class="text-indigo-600 hover:text-indigo-500 font-medium">Đăng Nhập</a>
        </div>
    </div>
</div>