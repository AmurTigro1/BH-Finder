<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Stern - FindBoard')</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="icon" href="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIGZpbGw9Im5vbmUiIHZpZXdCb3g9IjAgMCAyNCAyNCIgc3Ryb2tlLXdpZHRoPSIxLjUiIHN0cm9rZT0iY3VycmVudENvbG9yIj4gPHBhdGggZD0iTTEuNTUgMTEuMDV2My42MTJsMS41NjMgMS41NjMiLz48L3N2Zz4=" type="image/svg+xml">

</head>
<body class=" text-gray-300 font-poppins">
    @include('header')

    <div class="content">
        @yield('content')
    </div>

    <footer class="py-12 px-4">
        <div class="container mx-auto text-center">
            <p class="text-gray-400">&copy; 2024 FindBoard. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>
