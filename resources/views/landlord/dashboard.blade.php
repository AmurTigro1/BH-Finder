<!-- resources/views/admin/dashboard.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    @vite('resources/css/app.css')
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="flex">
        <!-- Sidebar -->
        <div class="w-1/4 bg-gray-800 h-screen">
            <div class="text-white text-center py-4">
                <h1 class="text-2xl font-bold">Admin Dashboard</h1>
            </div>
            <ul class="mt-10 text-gray-400">
                <li class="px-6 py-3 hover:bg-gray-700"><a href="#">Dashboard</a></li>
                <li class="px-6 py-3 hover:bg-gray-700"><a href="#">Users</a></li>
                <li class="px-6 py-3 hover:bg-gray-700"><a href="#">Settings</a></li>
            </ul>
        </div>

        <!-- Main Content -->
        <div class="w-3/4 p-6">
            <h2 class="text-3xl font-semibold text-gray-700">Welcome to the Admin Dashboard</h2>

            <!-- Statistics Section -->
            <div class="grid grid-cols-3 gap-4 mt-6">
                <div class="bg-white p-4 rounded-lg shadow-md">
                    <h3 class="text-xl font-bold text-gray-600">Total Users</h3>
                    <p class="mt-2 text-3xl font-bold">1200</p>
                </div>
                <div class="bg-white p-4 rounded-lg shadow-md">
                    <h3 class="text-xl font-bold text-gray-600">Total Posts</h3>
                    <p class="mt-2 text-3xl font-bold">345</p>
                </div>
                <div class="bg-white p-4 rounded-lg shadow-md">
                    <h3 class="text-xl font-bold text-gray-600">Comments</h3>
                    <p class="mt-2 text-3xl font-bold">1500</p>
                </div>
            </div>

            <!-- Table Section -->
            <div class="mt-8">
                <h3 class="text-2xl font-bold text-gray-700 mb-4">Recent Activities</h3>
                <table class="min-w-full bg-white shadow-md rounded-lg">
                    <thead>
                        <tr>
                            <th class="py-2 px-4 text-left">User</th>
                            <th class="py-2 px-4 text-left">Activity</th>
                            <th class="py-2 px-4 text-left">Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="border-b">
                            <td class="py-2 px-4">John Doe</td>
                            <td class="py-2 px-4">Created a new post</td>
                            <td class="py-2 px-4">Sep 5, 2024</td>
                        </tr>
                        <tr class="border-b">
                            <td class="py-2 px-4">Jane Smith</td>
                            <td class="py-2 px-4">Commented on a post</td>
                            <td class="py-2 px-4">Sep 4, 2024</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
