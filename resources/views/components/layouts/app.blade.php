<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Thư viện ITC' }}</title>
    <link rel="icon" type="image/x-icon" href="../../../../public//build/assets/logo.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet" />
    @livewireStyles
</head>

<body class="bg-gray-100 min-h-screen dark:bg-gray-900">
    <!-- <section class="dots-container">
        <div class="dot"></div>
        <div class="dot"></div>
        <div class="dot"></div>
        <div class="dot"></div>
        <div class="dot"></div>
    </section> -->
    {{ $slot }}
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            setTimeout(function() {
                document.querySelector(".dots-container").style.display = "none";
            }, 1000);
        });
    </script>
    <script>
        document.addEventListener("turbo:before-visit", function() {
            let loader = document.querySelector(".dots-container");
            if (loader) {
                loader.style.display = "block"; // Hiện lại loading
                loader.style.opacity = "1"; // Hiển thị từ từ
            }
        });
    </script>

    @livewireScripts
    @vite('resources/js/app.js')
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
</body>

</html>