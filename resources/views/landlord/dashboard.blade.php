<!-- resources/views/LandLord/dashboard.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LandLord Dashboard</title>
    @vite('resources/css/app.css')
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="flex">
        <!-- Include Sidebar -->
        @include('LandLord.partials.sidebar')

        <!-- Main Content -->
        <div class="w-3/4 p-6">
            {{-- @include('LandLord.partials.welcome_message') --}}
            
            <!-- Include Statistics Section -->
            @include('LandLord.partials.statistics')

            <!-- Include Recent Activities Table -->
            @include('LandLord.partials.user-data')
        </div>
    </div>
</body>
</html>
