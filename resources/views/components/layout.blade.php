<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    @vite(['resources/css/app.css','resources/js/app.js'])


    <!-- dia ambil dari alpine.js web untuk menjalankan java script -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    
    {{-- script flowbite --}}
</head>
<body class="h-full">
    <div class="min-h-full">
        <x-nav-bar></x-nav-bar>
        <x-header>{{ $title }}</x-header>
        <main>
            <div class="mx-auto max-w-7x1 py-6 sm:px-6 lg:px-8">
                {{ $slot }}
            </div>
        </main>
    </div>

</body>
</html>