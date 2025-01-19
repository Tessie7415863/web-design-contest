<div class="flex space-x-4 my-2">
    <button wire:click="setTheme('dark')" class="cursor-pointer flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm 
        text-gray-800 hover:bg-gray-100 focus:ring-2 focus:ring-blue-500 
        dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300 dark:focus:outline-none 
        dark:focus:ring-1 dark:focus:ring-gray-600 
        @if ($theme === 'dark') bg-gray-200 dark:bg-gray-600 @endif">
        🌙 Dark
    </button>

    <button wire:click="setTheme('light')" class="cursor-pointer flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm 
        text-gray-800 hover:bg-gray-100 focus:ring-2 focus:ring-blue-500 
        dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300 dark:focus:outline-none 
        dark:focus:ring-1 dark:focus:ring-gray-600 
        @if ($theme === 'light') bg-gray-200 dark:bg-gray-600 @endif">
        ☀️ Light
    </button>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const updateTheme = (theme) => {
            if (Array.isArray(theme)) {
                theme = theme[0];
            }

            if (theme === "dark") {
                document.documentElement.classList.add("dark");
            } else {
                document.documentElement.classList.remove("dark");
            }
        };

        window.addEventListener('themeUpdated', (event) => {
            updateTheme(event.detail);
        });

        const initialTheme = @json($theme);
        updateTheme(initialTheme);
    });
</script>