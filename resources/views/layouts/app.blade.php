<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Peminjaman Barang')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body style="background-color: F9F8F6;">
    <div>
        @yield('content')
    </div>
</body>
</html>
